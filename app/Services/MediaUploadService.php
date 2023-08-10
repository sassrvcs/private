<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MediaUploadService
{

    const TEMP_PATH          = "app/temp/";
    const DELETE_ERROR       = "Unable to Delete, Already Published!";
    const MEDIA_DELETED      = "File deleted";
    const FILE_TYPE_TEMP     = "temp";
    const PROFILE_IMAGES     = "profile-images";
    const MEDIA_NOT_FOUND    = "File not found.";
    const FILE_TYPE_SPATIE   = "spatie";
    const MEDIA_UPLOAD_ERROR = "Error during file upload.";

    /**
     * Store image in temp folder
     * @param $request
     * @return string $filename
     */
    public function store($request)
    {
        try {
            $file = $request->image ?? $request->video ?? $request->document ?? $request->file;
            $filename = Str::uuid() . time() . "." . $file->getClientOriginalExtension();

            $file->storeAs('temp', $filename);

            return $filename;

        } catch (Exception $e) {
            return static::MEDIA_UPLOAD_ERROR;
        }
    }

    /**
     * Store profile image copy temp file to main storage and delete if previouly image is present in database
     * @param User $user
     * @param ProfileUpdateRequest $request
     * @return User
     */
    public function storeMedia($user, $request, $mediaMane = "")
    {
        if (isset($request["image"])) {
            // Delete existing image
            $prevProfileImage  = $user->getFirstMedia(static::PROFILE_IMAGES);
            if ($prevProfileImage) {
                $prevProfileImage->delete();
            }

            if (file_exists(storage_path(static::TEMP_PATH . $request["image"]))) {
                // Log::notice('exists');
                // User::first()->addMedia($pathToImage)->toMediaCollection();
                $user->addMedia(storage_path(static::TEMP_PATH . $request["image"]))
                    ->usingFileName(Str::uuid() . time() . ".jpeg")
                    ->withCustomProperties(['mime-type' => 'image/jpeg'])
                    ->toMediaCollection(static::PROFILE_IMAGES);
            } else {
                Log::notice(static::TEMP_PATH . $request['image'] . " does not exists");
            }
        }
    }

    /**
     * Upload category media and attached with model
     * @param Model $model
     * @param File $request
     * @param string $collection
     */
    public function attachedMediaWithModel($model, $request, $collection)
    {
        $model->addMedia($request)->usingFileName(Str::uuid() . time() . ".jpeg")
            ->withCustomProperties(['mime-type' => 'image/jpeg'])
            ->toMediaCollection($collection);
    }

    /**
     * Upload product media and attached with model
     * @param Model $model
     * @param File $request
     * @param string $collection
     */
    public function attachedProductMediaWithModel($model, $files, $collection)
    {
        if ( sizeof($files) > 0 ) {
            foreach($files as $image) {
                $model->addMedia($image)
                    ->usingFileName(Str::uuid() . time() . ".jpeg")
                    ->withCustomProperties(['mime-type' => 'image/jpeg'])
                    ->toMediaCollection($collection);
            }
        } else {
            $model->addMedia($files)
                ->usingFileName(Str::uuid() . time() . ".jpeg")
                ->withCustomProperties(['mime-type' => 'image/jpeg'])
                ->toMediaCollection($collection);
        }

    }

    /**
    * Delete Media as per type (temp/spatie)
    * @param $file
    * @see https://github.com/spatie/laravel-medialibrary/issues/749
    */
    public function delete($file)
    {
        try {
            $filePath = "app/temp/" . $file;
            unlink(storage_path($filePath));
            return static::MEDIA_DELETED;
        } catch (Exception $e) {
            return static::MEDIA_NOT_FOUND;
        }
    }

    public function deleteMedia($file)
    {
        // if ($type == static::FILE_TYPE_TEMP) {
        //     return $this->mediaUploadService->delete($file);
        // } elseif ($type == static::FILE_TYPE_SPATIE) {
        //     try {
        //         ---------- Your code -----------------
        //         return MediaUploadService::MEDIA_DELETED;
        //     } catch (Exception $e) {
        //         return MediaUploadService::MEDIA_NOT_FOUND;
        //     }
        // }
    }
}