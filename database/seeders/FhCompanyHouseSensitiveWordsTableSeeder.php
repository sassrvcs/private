<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FhCompanyHouseSensitiveWordsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('company_house_sensitive_words')->delete();

        DB::table('company_house_sensitive_words')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Chamber of Commerce',
                'description' => '<p>The use of ‘Chamber of Commerce’ in your proposed name could imply a connection with the British, Northern Ireland or Scottish Chambers of Commerce. To support your application, please provide a letter or email of non-objection from the relevant body.</p>
                    <h4 id="england-and-wales">England and Wales</h4>
                    <p><a href="mailto:enquiries@britishchambers.org.uk" class="govuk-link">enquiries@britishchambers.org.uk</a></p>
                    <div class="address"><div class="adr org fn"><p>
                    British Chambers of Commerce
                    <br>65 Petty France
                    <br>London
                    <br>SW1H 9EU
                    <br>
                    </p></div></div>
                    <h4 id="northern-ireland-1">Northern Ireland</h4>
                    <p><a href="mailto:mail@northernirelandchamber.com" class="govuk-link">mail@northernirelandchamber.com</a></p>
                    <div class="address"><div class="adr org fn"><p>
                    Northern Ireland Chamber of Commerce and Industry
                    <br>40 Linenhall Street
                    <br>Belfast 
                    <br>BT2 8BA
                    <br>
                    </p></div></div>',
                'is_document_required' => 1,
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Albannach',
                'description' => '<h4 id="use-in-a-name-that-does-not-imply-a-connection-with-the-scottish-government">Use in a name that does not imply a connection with the Scottish Government</h4>

<p>Applications under the criteria set out in 1-3 below should be sent directly to Companies House.</p>

<ol>
<li>If you wish to use this word at the start of your proposed name you will need to demonstrate that the company is pre-eminent or very substantial in its sector. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with. The situation of the company’s registered office must be in Scotland. This does not apply if this word is used in a business name.</li>
<li>If this word is not the first word in your proposed name it will normally be allowed provided the company’s registered office is in Scotland. This does not apply if this word is used in a business name.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes forenames or initials. This requirement does not apply to use in a business name.</li>
</ol>

<h4 id="use-in-a-name-that-could-imply-a-connection-with-the-scottish-government">Use in a name that could imply a connection with the Scottish Government</h4>

<p>If your proposed name is likely to imply a connection with the Scottish Government, you will need to provide a letter or email of non-objection from this body and include a copy when you send your application to Companies House. The situation of the company’s registered office must be in Scotland. In the case of a business name, the principal place of business must be in Scotland. Please confirm the address in your application.</p>

<p>You should only contact the Scottish Government if the name is likely to imply a connection with this body.</p>

<p><a href="mailto:protocol@gov.scot" class="govuk-link">protocol@gov.scot</a></p>

<div class="address"><div class="adr org fn"><p>

Scottish Government 
<br>Protocol and Honours Team
<br>Room 4N.02
<br>St Andrew\'s House
<br>Regent Road
<br>Edinburgh
<br>EH1 3DG
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Britain',
                'description' => '<ol>
<li>If your proposed name does not imply a connection with a government department or body, and you wish to use this word at the start of your proposed name, or ‘of Britain’ or ‘of Great Britain’ anywhere in the name, you will need to demonstrate that the company is pre-eminent or very substantial in its field. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with.</li>
<li>If this word is not the first word in the name it will normally be allowed.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes a forename or initials.</li>
<li>If the use of this word in any part of your proposed name does imply a connection with a government department, a devolved administration or a local or specified public authority, please provide a letter or email of non-objection from the relevant body. This also applies if the word is a surname.</li>
</ol>',
                'is_document_required' => 1,
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'Benevolent',
                'description' => '<p>Benevolent organisations are normally bodies that provide help and support for individuals and their families.</p>

<p>This word should normally be included in the name of company limited by guarantee.   A one-member one-vote clause and a non-profit distribution clause should be included in the articles of association. In the case of a business name, the articles or relevant governance document should include similar clauses. Please include a copy of this document with your application.</p>',
                'is_document_required' => 1,
            ),
            4 =>
            array(
                'id' => 5,
                'name' => 'Breatainn',
                'description' => '<ol>
<li>If your proposed name does not imply a connection with a government department or body, and you wish to use this word at the start of your name, you will need to demonstrate that the company is pre-eminent or very substantial in its field. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with.</li>
<li>If this word is not the first word in the name it will normally be allowed.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes a forename or initials.</li>
<li>If the use of this word in any part of your proposed name does imply a connection with a government department, a devolved administration or a local or specified public authority, please provide a letter or email of non-objection from the relevant body. This applies even if the name is a surname.</li>
</ol>',
                'is_document_required' => 1,
            ),
            5 =>
            array(
                'id' => 6,
                'name' => 'Charity',
                'description' => '<h4 id="new-incorporation-or-business-name">New incorporation or business name</h4>

<p>To use this word in your proposed name, please provide a letter or email of non-objection from the relevant charity regulator.</p>

<h4 id="england-and-wales-1">England and Wales</h4>

<p><a href="mailto:registrationapplications@charitycommission.gov.uk" class="govuk-link">registrationapplications@charitycommission.gov.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Head of Registration 
<br>Charity Commission 
<br>PO Box 211 
<br>Bootle 
<br>L20 7YX
<br>
</p></div></div>

<h4 id="scotland-2">Scotland</h4>

<p><a href="mailto:info@oscr.org.uk" class="govuk-link">info@oscr.org.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Office of the Scottish Charity Regulator
<br>2nd Floor Quadrant House
<br>9 Riverside Drive
<br>Dundee
<br>DD1 4NY
<br>
</p></div></div>

<h4 id="northern-ireland-2">Northern Ireland</h4>

<p><a href="mailto:admin@charitycommissionni.org.uk" class="govuk-link">admin@charitycommissionni.org.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Charity Commission for Northern Ireland
<br>257 Lough Road
<br>Lurgan
<br>BT66 6NQ
<br>
</p></div></div>
<h4 id="change-of-name">Change of name</h4>

<p>If you are an existing registered charity and your current and/or proposed new name includes one of these words, then your application should include a copy of the company’s letterhead (or alternative evidence) bearing the registered charity number. Subject to our normal examination checks, we will register or approve the name.</p>

<p>If you are a Northern Ireland company not registered with the Charity Commission for Northern Ireland (CCNI) and included in the HMRC ‘deemed list’, please provide evidence of the company’s tax-exempt status, or contact CCNI.</p>',
                'is_document_required' => 1,
            ),
            6 =>
            array(
                'id' => 8,
                'name' => 'Adjudicator',
                'description' => '<p>The use of this word in a company or business name normally implies the organisation has a quasi-judicial role similar to decisions made by a court of law, an administrative tribunal, an arbiter, official ombudsman or government officials.</p>

<p>To support your application, please provide a letter or email of non-objection from a relevant body.</p>',
                'is_document_required' => 1,
            ),
            7 =>
            array(
                'id' => 9,
                'name' => 'Bachelor of medicine',
                'description' => '<p>This title is protected by The Medical Act 1983. To support your application to use this expression in a company or business name, please provide evidence of your inclusion on the <a rel="external" href="https://www.gmc-uk.org/registration-and-licensing/the-medical-register" class="govuk-link">GMC Medical register</a>.</p>

<h2 id="BuildSoc">',
                'is_document_required' => 1,
            ),
            8 =>
            array(
                'id' => 10,
                'name' => 'Accounts Commission',
                'description' => '<p>To use this expression or anything similar in your proposed name, please provide a letter or email of non-objection from Audit Scotland.</p>
<p><a href="mailto:info@audit-scotland.gov.uk" class="govuk-link">info@audit-scotland.gov.uk</a></p>
<p>

Audit Scotland
<br>4th Floor
<br>102 West Port
<br>Edinburgh
<br>EH3 9DN
<br>
</p>',
                'is_document_required' => 1,
            ),
            9 =>
            array(
                'id' => 11,
                'name' => 'Accredit',
                'description' => '<p>To use this word in your proposed name, you must provide a letter or email of non-objection from the department shown below.</p>
<p>To speed up your application, make sure your email or letter is marked for the attention of the ‘Standards and Accreditation Team - Office for Product Safety and Standards’. Before proceeding please read the <a href="https://www.gov.uk/guidance/naming-your-business-apply-to-use-accredited-or-related-words-in-your-companys-name" class="govuk-link">additional guidance</a>.</p>
<p><a href="mailto:opss.enquiries@beis.gov.uk" class="govuk-link">opss.enquiries@beis.gov.uk</a></p>',
                'is_document_required' => 1,
            ),
            10 =>
            array(
                'id' => 12,
                'name' => 'Accreditation',
                'description' => '<p>To use this word in your proposed name, you must provide a letter or email of non-objection from the department shown below.</p>
<p>To speed up your application, make sure your email or letter is marked for the attention of the ‘Standards and Accreditation Team - Office for Product Safety and Standards’. Before proceeding please read the <a href="https://www.gov.uk/guidance/naming-your-business-apply-to-use-accredited-or-related-words-in-your-companys-name" class="govuk-link">additional guidance</a>.</p>
<p><a href="mailto:opss.enquiries@beis.gov.uk" class="govuk-link">opss.enquiries@beis.gov.uk</a></p>',
                'is_document_required' => 1,
            ),
            11 =>
            array(
                'id' => 13,
                'name' => 'Accredited',
                'description' => '<p>To use this word in your proposed name, you must provide a letter or email of non-objection from the department shown below.</p>
<p>To speed up your application, make sure your email or letter is marked for the attention of the ‘Standards and Accreditation Team - Office for Product Safety and Standards’. Before proceeding please read the <a href="https://www.gov.uk/guidance/naming-your-business-apply-to-use-accredited-or-related-words-in-your-companys-name" class="govuk-link">additional guidance</a>.</p>
<p><a href="mailto:opss.enquiries@beis.gov.uk" class="govuk-link">opss.enquiries@beis.gov.uk</a></p>',
                'is_document_required' => 1,
            ),
            12 =>
            array(
                'id' => 14,
                'name' => 'Accrediting',
                'description' => '<p>To use this word in your proposed name, you must provide a letter or email of non-objection from the department shown below.</p>
<p>To speed up your application, make sure your email or letter is marked for the attention of the ‘Standards and Accreditation Team - Office for Product Safety and Standards’. Before proceeding please read the <a href="https://www.gov.uk/guidance/naming-your-business-apply-to-use-accredited-or-related-words-in-your-companys-name" class="govuk-link">additional guidance</a>.</p>
<p><a href="mailto:opss.enquiries@beis.gov.uk" class="govuk-link">opss.enquiries@beis.gov.uk</a></p>',
                'is_document_required' => 1,
            ),
            13 =>
            array(
                'id' => 15,
                'name' => 'Alba',
                'description' => '<h4 id="use-in-a-name-that-does-not-imply-a-connection-with-the-scottish-government">Use in a name that does not imply a connection with the Scottish Government</h4>

<p>Applications under the criteria set out in 1-3 below should be sent directly to Companies House.</p>

<ol>
<li>If you wish to use this word at the start of your proposed name you will need to demonstrate that the company is pre-eminent or very substantial in its sector. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with. The situation of the company’s registered office must be in Scotland. This does not apply if this word is used in a business name.</li>
<li>If this word is not the first word in your proposed name it will normally be allowed provided the company’s registered office is in Scotland. This does not apply if this word is used in a business name.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes forenames or initials. This requirement does not apply to use in a business name.</li>
</ol>

<h4 id="use-in-a-name-that-could-imply-a-connection-with-the-scottish-government">Use in a name that could imply a connection with the Scottish Government</h4>

<p>If your proposed name is likely to imply a connection with the Scottish Government, you will need to provide a letter or email of non-objection from this body and include a copy when you send your application to Companies House. The situation of the company’s registered office must be in Scotland. In the case of a business name, the principal place of business must be in Scotland. Please confirm the address in your application.</p>

<p>You should only contact the Scottish Government if the name is likely to imply a connection with this body.</p>

<p><a href="mailto:protocol@gov.scot" class="govuk-link">protocol@gov.scot</a></p>

<div class="address"><div class="adr org fn"><p>

Scottish Government 
<br>Protocol and Honours Team
<br>Room 4N.02
<br>St Andrew\'s House
<br>Regent Road
<br>Edinburgh
<br>EH1 3DG
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            14 =>
            array(
                'id' => 16,
                'name' => 'Na h-Alba',
                'description' => '<h4 id="use-in-a-name-that-does-not-imply-a-connection-with-the-scottish-government">Use in a name that does not imply a connection with the Scottish Government</h4>

<p>Applications under the criteria set out in 1-3 below should be sent directly to Companies House.</p>

<ol>
<li>If you wish to use this word at the start of your proposed name you will need to demonstrate that the company is pre-eminent or very substantial in its sector. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with. The situation of the company’s registered office must be in Scotland. This does not apply if this word is used in a business name.</li>
<li>If this word is not the first word in your proposed name it will normally be allowed provided the company’s registered office is in Scotland. This does not apply if this word is used in a business name.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes forenames or initials. This requirement does not apply to use in a business name.</li>
</ol>

<h4 id="use-in-a-name-that-could-imply-a-connection-with-the-scottish-government">Use in a name that could imply a connection with the Scottish Government</h4>

<p>If your proposed name is likely to imply a connection with the Scottish Government, you will need to provide a letter or email of non-objection from this body and include a copy when you send your application to Companies House. The situation of the company’s registered office must be in Scotland. In the case of a business name, the principal place of business must be in Scotland. Please confirm the address in your application.</p>

<p>You should only contact the Scottish Government if the name is likely to imply a connection with this body.</p>

<p><a href="mailto:protocol@gov.scot" class="govuk-link">protocol@gov.scot</a></p>

<div class="address"><div class="adr org fn"><p>

Scottish Government 
<br>Protocol and Honours Team
<br>Room 4N.02
<br>St Andrew\'s House
<br>Regent Road
<br>Edinburgh
<br>EH1 3DG
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            15 =>
            array(
                'id' => 17,
                'name' => 'Archwilydd Cyffredinol Cymru',
                'description' => '<p>To use this expression or anything similar in your proposed name, please provide a letter or email of non-objection from the Wales Audit Office.</p>
<p><a href="mailto:info@audit.wales" class="govuk-link">info@audit.wales</a></p>
<div class="address"><div class="adr org fn"><p>

Archwilydd Cyffredinol Cymru 
<br>Swyddfa Archwilio Cymru 
<br>24 Heol y Gadeirlan 
<br>Caerdydd 
<br>CF11 9LJ 
<br>
</p></div></div>
<div class="address"><div class="adr org fn"><p>

Auditor General for Wales
<br>Wales Audit Office
<br>24 Cathedral Road
<br>Cardiff
<br>CF11 9LJ
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            16 =>
            array(
                'id' => 18,
                'name' => 'Association',
                'description' => '<p>This word is normally included in the name of a company limited by guarantee. A one member one-vote clause and a non-profit distribution clause should be included in the articles of association. The non-profit clause provides that any profits are used to further the objects of the company and not paid to the members as dividends.</p>
<p>This word is normally included in the name of a company limited by guarantee. A one member one-vote clause and a non-profit distribution clause should be included in the articles of association. The non-profit clause provides that any profits are used to further the objects of the company and not paid to the members as dividends.</p>
<p>These requirements do not apply if the company or business is a resident or tenant association.</p>',
                'is_document_required' => 1,
            ),
            17 =>
            array(
                'id' => 19,
                'name' => 'Assurance',
                'description' => '<h4 id="use-in-a-company-or-other-registered-name">Use in a company or other registered name</h4>
<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Financial Conduct Authority.</p>
<p><a href="mailto:SensitiveBusinesN@fca.org.uk" class="govuk-link">SensitiveBusinessN@fca.org.uk</a></p>
<h4 id="use-in-a-businesstrading-name">Use in a business/trading name</h4>
<p>If you intend to use this word in a business/trading name which is different to your company name, you will need to provide a copy of a letter or email of non-objection from the Financial Conduct Authority and send it to <a href="mailto:enquiries@companieshouse.gov.uk" class="govuk-link">enquiries@companieshouse.gov.uk</a></p>
<p>Please ensure you include the proposed name in the email subject line. If the name is approved, we will send a response by email.</p>
<div class="address"><div class="adr org fn"><p>

Sensitive Business Names Team  
<br>Financial Conduct Authority  
<br>12 Endeavour Square  
<br>London  
<br>E20 1JN  
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            18 =>
            array(
                'id' => 20,
                'name' => 'Assurer',
                'description' => '<h4 id="use-in-a-company-or-other-registered-name">Use in a company or other registered name</h4>
<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Financial Conduct Authority.</p>
<p><a href="mailto:SensitiveBusinesN@fca.org.uk" class="govuk-link">SensitiveBusinessN@fca.org.uk</a></p>
<h4 id="use-in-a-businesstrading-name">Use in a business/trading name</h4>
<p>If you intend to use this word in a business/trading name which is different to your company name, you will need to provide a copy of a letter or email of non-objection from the Financial Conduct Authority and send it to <a href="mailto:enquiries@companieshouse.gov.uk" class="govuk-link">enquiries@companieshouse.gov.uk</a></p>
<p>Please ensure you include the proposed name in the email subject line. If the name is approved, we will send a response by email.</p>
<div class="address"><div class="adr org fn"><p>

Sensitive Business Names Team  
<br>Financial Conduct Authority  
<br>12 Endeavour Square  
<br>London  
<br>E20 1JN  
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            19 =>
            array(
                'id' => 21,
                'name' => 'Audit Commission',
                'description' => '<p>The use of this expression, or anything similar, in your proposed name is likely to imply a connection with activities carried out by one or more of the following bodies:</p>
<ul>
<li>National Audit Office - <a href="mailto:enquiries@nao.org.uk" class="govuk-link">enquiries@nao.org.uk</a>
</li>
<li>Financial Reporting Council - <a href="mailto:enquiries@frc.org.uk" class="govuk-link">enquiries@frc.org.uk</a>
</li>
<li>Cabinet Office - <a href="mailto:publiccorrespondence@cabinetoffice.gov.uk" class="govuk-link">publiccorrespondence@cabinetoffice.gov.uk</a>
</li>
<li>Public Sector Audit Appointments - <a href="mailto:generalenquiries@psaa.co.uk" class="govuk-link">generalenquiries@psaa.co.uk</a>
</li>
</ul>
<p>If you decide to proceed with your application, please include a copy of a letter or email of non-objection from the relevant body.</p>',
                'is_document_required' => 1,
            ),
            20 =>
            array(
                'id' => 22,
                'name' => 'Auditor General',
                'description' => '<p>To use this expression or anything similar in your proposed name, please provide a letter or email of non-objection from the relevant body.</p>
<h4 id="england">England</h4>
<p><a href="mailto:enquiries@nao.org.uk" class="govuk-link">enquiries@nao.org.uk</a></p>
<p>

National Audit Office
<br>157-197 Buckingham Palace Road
<br>London
<br>SW1W 9SP 
<br>
</p>',
                'is_document_required' => 1,
            ),
            21 =>
            array(
                'id' => 23,
                'name' => 'Audit Office',
                'description' => '<p>To use this expression or anything similar in your proposed name, please provide a letter or email of non-objection from the relevant body.</p>
<h4 id="england">England</h4>
<p><a href="mailto:enquiries@nao.org.uk" class="govuk-link">enquiries@nao.org.uk</a></p>
<p>

National Audit Office
<br>157-197 Buckingham Palace Road
<br>London
<br>SW1W 9SP 
<br>
</p>',
                'is_document_required' => 1,
            ),
            22 =>
            array(
                'id' => 24,
                'name' => 'Auditor General for Northern Ireland',
                'description' => '<p>To use this expression or anything similar in your proposed name, please provide a letter or email of non-objection from the Northern Ireland Audit Office.</p>
<p><a href="mailto:info@niauditoffice.gov.uk" class="govuk-link">info@niauditoffice.gov.uk</a></p>
<div class="address"><div class="adr org fn"><p>

Northern Ireland Audit Office
<br>106 University Street
<br>Belfast
<br>BT7 1EU
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            23 =>
            array(
                'id' => 25,
                'name' => 'Auditor General for Scotland',
                'description' => '<p>To use this expression or anything similar in your proposed name, please provide a letter or email of non-objection from Audit Scotland.</p>
<p><a href="mailto:info@audit-scotland.gov.uk" class="govuk-link">info@audit-scotland.gov.uk</a></p>
<div class="address"><div class="adr org fn"><p>

Audit Scotland
<br>102 West Port
<br>Edinburgh
<br>EH3 9DN
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            24 =>
            array(
                'id' => 26,
                'name' => 'Audit Scotland',
                'description' => '
<p>To use this expression or anything similar in your proposed name, please provide a letter or email of non-objection from Audit Scotland.</p>
<p><a href="mailto:info@audit-scotland.gov.uk" class="govuk-link">info@audit-scotland.gov.uk</a></p>
<div class="address"><div class="adr org fn"><p>

Audit Scotland
<br>102 West Port
<br>Edinburgh
<br>EH3 9DN
<br>
</p></div></div>
',
                'is_document_required' => 1,
            ),
            25 =>
            array(
                'id' => 27,
                'name' => 'Auditor General for Wales',
                'description' => '<p>To use this expression or anything similar in your proposed name, please provide a letter or email of non-objection from the Wales Audit Office.</p>
<p><a href="mailto:info@audit.wales" class="govuk-link">info@audit.wales</a></p>
<div class="address"><div class="adr org fn"><p>

Auditor General for Wales 
<br>Wales Audit Office
<br>24 Cathedral Road 
<br>Cardiff 
<br>CF11 9LJ
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            26 =>
            array(
                'id' => 28,
                'name' => 'Audit Wales',
                'description' => '<p>To use this expression or anything similar in your proposed name, please provide a letter or email of non-objection from the Wales Audit Office.</p>
<p><a href="mailto:info@audit.wales" class="govuk-link">info@audit.wales</a></p>
<div class="address"><div class="adr org fn"><p>

Auditor General for Wales 
<br>Wales Audit Office
<br>24 Cathedral Road 
<br>Cardiff 
<br>CF11 9LJ
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            27 =>
            array(
                'id' => 29,
                'name' => 'Banc',
                'description' => '<h4 id="use-in-a-company-or-other-registered-name-1">Use in a company or other registered name</h4>
<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Financial Conduct Authority.</p>
<p><a href="mailto:SensitiveBusinesN@fca.org.uk" class="govuk-link">SensitiveBusinessN@fca.org.uk</a></p>
<h4 id="use-in-a-businesstrading-name-1">Use in a business/trading name</h4>
<p>If you intend to use this word in a business/trading name which is different to your company name, you will need to provide a copy of a letter or email of non-objection from the Financial Conduct Authority and send it to <a href="mailto:enquiries@companieshouse.gov.uk" class="govuk-link">enquiries@companieshouse.gov.uk</a></p>
<p>Please ensure you include the proposed name in the email subject line. If the name is approved, we will send a response by email.</p>
<div class="address"><div class="adr org fn"><p>

Sensitive Business Names Team  
<br>Financial Conduct Authority  
<br>12 Endeavour Square  
<br>London  
<br>E20 1JN  
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            28 =>
            array(
                'id' => 30,
                'name' => 'Bank',
                'description' => '<h4 id="use-in-a-company-or-other-registered-name-1">Use in a company or other registered name</h4>
<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Financial Conduct Authority.</p>
<p><a href="mailto:SensitiveBusinesN@fca.org.uk" class="govuk-link">SensitiveBusinessN@fca.org.uk</a></p>
<h4 id="use-in-a-businesstrading-name-1">Use in a business/trading name</h4>
<p>If you intend to use this word in a business/trading name which is different to your company name, you will need to provide a copy of a letter or email of non-objection from the Financial Conduct Authority and send it to <a href="mailto:enquiries@companieshouse.gov.uk" class="govuk-link">enquiries@companieshouse.gov.uk</a></p>
<p>Please ensure you include the proposed name in the email subject line. If the name is approved, we will send a response by email.</p>
<div class="address"><div class="adr org fn"><p>

Sensitive Business Names Team  
<br>Financial Conduct Authority  
<br>12 Endeavour Square  
<br>London  
<br>E20 1JN  
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            29 =>
            array(
                'id' => 31,
                'name' => 'Banking',
                'description' => '<h4 id="use-in-a-company-or-other-registered-name-1">Use in a company or other registered name</h4>
<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Financial Conduct Authority.</p>
<p><a href="mailto:SensitiveBusinesN@fca.org.uk" class="govuk-link">SensitiveBusinessN@fca.org.uk</a></p>
<h4 id="use-in-a-businesstrading-name-1">Use in a business/trading name</h4>
<p>If you intend to use this word in a business/trading name which is different to your company name, you will need to provide a copy of a letter or email of non-objection from the Financial Conduct Authority and send it to <a href="mailto:enquiries@companieshouse.gov.uk" class="govuk-link">enquiries@companieshouse.gov.uk</a></p>
<p>Please ensure you include the proposed name in the email subject line. If the name is approved, we will send a response by email.</p>
<div class="address"><div class="adr org fn"><p>

Sensitive Business Names Team  
<br>Financial Conduct Authority  
<br>12 Endeavour Square  
<br>London  
<br>E20 1JN  
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            30 =>
            array(
                'id' => 32,
                'name' => 'Breatainn',
                'description' => '<ol>
<li>If your proposed name does not imply a connection with a government department or body, and you wish to use this word at the start of your name, you will need to demonstrate that the company is pre-eminent or very substantial in its field. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with.</li>
<li>If this word is not the first word in the name it will normally be allowed.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes a forename or initials.</li>
<li>If the use of this word in any part of your proposed name does imply a connection with a government department, a devolved administration or a local or specified public authority, please provide a letter or email of non-objection from the relevant body. This applies even if the name is a surname.</li>
</ol>',
                'is_document_required' => 1,
            ),
            31 =>
            array(
                'id' => 33,
                'name' => 'Breatannach',
                'description' => '<ol>
<li>If your proposed name does not imply a connection with a government department or body, and you wish to use this word at the start of your name, you will need to demonstrate that the company is pre-eminent or very substantial in its field. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with.</li>
<li>If this word is not the first word in the name it will normally be allowed.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes a forename or initials.</li>
<li>If the use of this word in any part of your proposed name does imply a connection with a government department, a devolved administration or a local or specified public authority, please provide a letter or email of non-objection from the relevant body. This applies even if the name is a surname.</li>
</ol>',
                'is_document_required' => 1,
            ),
            32 =>
            array(
                'id' => 34,
                'name' => 'Bhreatainn',
                'description' => '<ol>
<li>If your proposed name does not imply a connection with a government department or body, and you wish to use this word at the start of your name, you will need to demonstrate that the company is pre-eminent or very substantial in its field. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with.</li>
<li>If this word is not the first word in the name it will normally be allowed.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes a forename or initials.</li>
<li>If the use of this word in any part of your proposed name does imply a connection with a government department, a devolved administration or a local or specified public authority, please provide a letter or email of non-objection from the relevant body. This applies even if the name is a surname.</li>
</ol>',
                'is_document_required' => 1,
            ),
            33 =>
            array(
                'id' => 35,
                'name' => 'Bhreatanach',
                'description' => '<ol>
<li>If your proposed name does not imply a connection with a government department or body, and you wish to use this word at the start of your name, you will need to demonstrate that the company is pre-eminent or very substantial in its field. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with.</li>
<li>If this word is not the first word in the name it will normally be allowed.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes a forename or initials.</li>
<li>If the use of this word in any part of your proposed name does imply a connection with a government department, a devolved administration or a local or specified public authority, please provide a letter or email of non-objection from the relevant body. This applies even if the name is a surname.</li>
</ol>',
                'is_document_required' => 1,
            ),
            34 =>
            array(
                'id' => 36,
                'name' => 'Bhreatanaich',
                'description' => '<ol>
<li>If your proposed name does not imply a connection with a government department or body, and you wish to use this word at the start of your name, you will need to demonstrate that the company is pre-eminent or very substantial in its field. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with.</li>
<li>If this word is not the first word in the name it will normally be allowed.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes a forename or initials.</li>
<li>If the use of this word in any part of your proposed name does imply a connection with a government department, a devolved administration or a local or specified public authority, please provide a letter or email of non-objection from the relevant body. This applies even if the name is a surname.</li>
</ol>',
                'is_document_required' => 1,
            ),
            35 =>
            array(
                'id' => 37,
                'name' => 'Breatannaich',
                'description' => '<ol>
<li>If your proposed name does not imply a connection with a government department or body, and you wish to use this word at the start of your name, you will need to demonstrate that the company is pre-eminent or very substantial in its field. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with.</li>
<li>If this word is not the first word in the name it will normally be allowed.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes a forename or initials.</li>
<li>If the use of this word in any part of your proposed name does imply a connection with a government department, a devolved administration or a local or specified public authority, please provide a letter or email of non-objection from the relevant body. This applies even if the name is a surname.</li>
</ol>',
                'is_document_required' => 1,
            ),
            36 =>
            array(
                'id' => 38,
                'name' => 'Brenin',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Welsh Government.</p>
<p>To speed up your application, please include:</p>
<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>
<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>
<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            37 =>
            array(
                'id' => 39,
                'name' => 'Brenhines',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Welsh Government.</p>
<p>To speed up your application, please include:</p>
<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>
<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>
<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            38 =>
            array(
                'id' => 40,
                'name' => 'Frenin',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Welsh Government.</p>
<p>To speed up your application, please include:</p>
<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>
<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>
<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            39 =>
            array(
                'id' => 41,
                'name' => 'Frenhines',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Welsh Government.</p>
<p>To speed up your application, please include:</p>
<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>
<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>
<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            40 =>
            array(
                'id' => 42,
                'name' => 'Brenhinol',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Welsh Government.</p>
<p>To speed up your application, please include:</p>
<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>
<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            41 =>
            array(
                'id' => 43,
                'name' => 'Brenhiniaeth',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Welsh Government.</p>
<p>To speed up your application, please include:</p>
<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>
<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            42 =>
            array(
                'id' => 44,
                'name' => 'Frenhinol',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Welsh Government.</p>
<p>To speed up your application, please include:</p>
<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>
<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            43 =>
            array(
                'id' => 45,
                'name' => 'Frenhiniaeth',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Welsh Government.</p>
<p>To speed up your application, please include:</p>
<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>
<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            44 =>
            array(
                'id' => 46,
                'name' => 'Britain',
                'description' => '<ol>
<li>If your proposed name does not imply a connection with a government department or body, and you wish to use this word at the start of your proposed name, or ‘of Britain’ or ‘of Great Britain’ anywhere in the name, you will need to demonstrate that the company is pre-eminent or very substantial in its field. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with.</li>
<li>If this word is not the first word in the name it will normally be allowed.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes a forename or initials.</li>
<li>If the use of this word in any part of your proposed name does imply a connection with a government department, a devolved administration or a local or specified public authority, please provide a letter or email of non-objection from the relevant body. This also applies if the word is a surname.</li>
</ol>',
                'is_document_required' => 1,
            ),
            45 =>
            array(
                'id' => 47,
                'name' => 'British',
                'description' => '<ol>
<li>If your proposed name does not imply a connection with a government department or body, and you wish to use this word at the start of your proposed name, or ‘of Britain’ or ‘of Great Britain’ anywhere in the name, you will need to demonstrate that the company is pre-eminent or very substantial in its field. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with.</li>
<li>If this word is not the first word in the name it will normally be allowed.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes a forename or initials.</li>
<li>If the use of this word in any part of your proposed name does imply a connection with a government department, a devolved administration or a local or specified public authority, please provide a letter or email of non-objection from the relevant body. This also applies if the word is a surname.</li>
</ol>',
                'is_document_required' => 1,
            ),
            46 =>
            array(
                'id' => 48,
                'name' => 'of Britain',
                'description' => '<ol>
<li>If your proposed name does not imply a connection with a government department or body, and you wish to use this word at the start of your proposed name, or ‘of Britain’ or ‘of Great Britain’ anywhere in the name, you will need to demonstrate that the company is pre-eminent or very substantial in its field. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with.</li>
<li>If this word is not the first word in the name it will normally be allowed.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes a forename or initials.</li>
<li>If the use of this word in any part of your proposed name does imply a connection with a government department, a devolved administration or a local or specified public authority, please provide a letter or email of non-objection from the relevant body. This also applies if the word is a surname.</li>
</ol>',
                'is_document_required' => 1,
            ),
            47 =>
            array(
                'id' => 49,
                'name' => 'of Great Britain',
                'description' => '<ol>
<li>If your proposed name does not imply a connection with a government department or body, and you wish to use this word at the start of your proposed name, or ‘of Britain’ or ‘of Great Britain’ anywhere in the name, you will need to demonstrate that the company is pre-eminent or very substantial in its field. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with.</li>
<li>If this word is not the first word in the name it will normally be allowed.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes a forename or initials.</li>
<li>If the use of this word in any part of your proposed name does imply a connection with a government department, a devolved administration or a local or specified public authority, please provide a letter or email of non-objection from the relevant body. This also applies if the word is a surname.</li>
</ol>',
                'is_document_required' => 1,
            ),
            48 =>
            array(
                'id' => 50,
                'name' => 'Chamber of Commerce',
                'description' => '<p>The use of ‘Chamber of Commerce’ in your proposed name could imply a connection with the British, Northern Ireland or Scottish Chambers of Commerce. To support your application, please provide a letter or email of non-objection from the relevant body.</p>
<h4 id="england-and-wales">England and Wales</h4>
<p><a href="mailto:enquiries@britishchambers.org.uk" class="govuk-link">enquiries@britishchambers.org.uk</a></p>
<div class="address"><div class="adr org fn"><p>

British Chambers of Commerce
<br>65 Petty France
<br>London
<br>SW1H 9EU
<br>
</p></div></div>
<h4 id="northern-ireland-1">Northern Ireland</h4>
<p><a href="mailto:mail@northernirelandchamber.com" class="govuk-link">mail@northernirelandchamber.com</a></p>
<div class="address"><div class="adr org fn"><p>

Northern Ireland Chamber of Commerce and Industry
<br>40 Linenhall Street
<br>Belfast 
<br>BT2 8BA
<br>
</p></div></div>
<h4 id="scotland-1">Scotland</h4>
<p><a href="mailto:admin@scottishchambers.org.uk" class="govuk-link">admin@scottishchambers.org.uk</a></p>
<div class="address"><div class="adr org fn"><p>

Scottish Chambers of Commerce
<br>199 Cathedral Street
<br>Glasgow
<br>G4 0QU
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            49 =>
            array(
                'id' => 51,
                'name' => 'Charitable',
                'description' => '<h4 id="new-incorporation-or-business-name">New incorporation or business name</h4>

<p>To use this word in your proposed name, please provide a letter or email of non-objection from the relevant charity regulator.</p>

<h4 id="england-and-wales-1">England and Wales</h4>

<p><a href="mailto:registrationapplications@charitycommission.gov.uk" class="govuk-link">registrationapplications@charitycommission.gov.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Head of Registration 
<br>Charity Commission 
<br>PO Box 211 
<br>Bootle 
<br>L20 7YX
<br>
</p></div></div>

<h4 id="scotland-2">Scotland</h4>

<p><a href="mailto:info@oscr.org.uk" class="govuk-link">info@oscr.org.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Office of the Scottish Charity Regulator
<br>2nd Floor Quadrant House
<br>9 Riverside Drive
<br>Dundee
<br>DD1 4NY
<br>
</p></div></div>

<h4 id="northern-ireland-2">Northern Ireland</h4>

<p><a href="mailto:admin@charitycommissionni.org.uk" class="govuk-link">admin@charitycommissionni.org.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Charity Commission for Northern Ireland
<br>257 Lough Road
<br>Lurgan
<br>BT66 6NQ
<br>
</p></div></div>
<h4 id="change-of-name">Change of name</h4>

<p>If you are an existing registered charity and your current and/or proposed new name includes one of these words, then your application should include a copy of the company’s letterhead (or alternative evidence) bearing the registered charity number. Subject to our normal examination checks, we will register or approve the name.</p>

<p>If you are a Northern Ireland company not registered with the Charity Commission for Northern Ireland (CCNI) and included in the HMRC ‘deemed list’, please provide evidence of the company’s tax-exempt status, or contact CCNI.</p>

<h2 id="charter">
<span class="number">21. </span>Charter</h2>',
                'is_document_required' => 1,
            ),
            50 =>
            array(
                'id' => 52,
                'name' => 'Charity',
                'description' => '<h4 id="new-incorporation-or-business-name">New incorporation or business name</h4>

<p>To use this word in your proposed name, please provide a letter or email of non-objection from the relevant charity regulator.</p>

<h4 id="england-and-wales-1">England and Wales</h4>

<p><a href="mailto:registrationapplications@charitycommission.gov.uk" class="govuk-link">registrationapplications@charitycommission.gov.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Head of Registration 
<br>Charity Commission 
<br>PO Box 211 
<br>Bootle 
<br>L20 7YX
<br>
</p></div></div>

<h4 id="scotland-2">Scotland</h4>

<p><a href="mailto:info@oscr.org.uk" class="govuk-link">info@oscr.org.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Office of the Scottish Charity Regulator
<br>2nd Floor Quadrant House
<br>9 Riverside Drive
<br>Dundee
<br>DD1 4NY
<br>
</p></div></div>

<h4 id="northern-ireland-2">Northern Ireland</h4>

<p><a href="mailto:admin@charitycommissionni.org.uk" class="govuk-link">admin@charitycommissionni.org.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Charity Commission for Northern Ireland
<br>257 Lough Road
<br>Lurgan
<br>BT66 6NQ
<br>
</p></div></div>
<h4 id="change-of-name">Change of name</h4>

<p>If you are an existing registered charity and your current and/or proposed new name includes one of these words, then your application should include a copy of the company’s letterhead (or alternative evidence) bearing the registered charity number. Subject to our normal examination checks, we will register or approve the name.</p>

<p>If you are a Northern Ireland company not registered with the Charity Commission for Northern Ireland (CCNI) and included in the HMRC ‘deemed list’, please provide evidence of the company’s tax-exempt status, or contact CCNI.</p>

<h2 id="charter">
<span class="number">21. </span>Charter</h2>',
                'is_document_required' => 1,
            ),
            51 =>
            array(
                'id' => 53,
                'name' => 'Charities',
                'description' => '<h4 id="new-incorporation-or-business-name">New incorporation or business name</h4>

<p>To use this word in your proposed name, please provide a letter or email of non-objection from the relevant charity regulator.</p>

<h4 id="england-and-wales-1">England and Wales</h4>

<p><a href="mailto:registrationapplications@charitycommission.gov.uk" class="govuk-link">registrationapplications@charitycommission.gov.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Head of Registration 
<br>Charity Commission 
<br>PO Box 211 
<br>Bootle 
<br>L20 7YX
<br>
</p></div></div>

<h4 id="scotland-2">Scotland</h4>

<p><a href="mailto:info@oscr.org.uk" class="govuk-link">info@oscr.org.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Office of the Scottish Charity Regulator
<br>2nd Floor Quadrant House
<br>9 Riverside Drive
<br>Dundee
<br>DD1 4NY
<br>
</p></div></div>

<h4 id="northern-ireland-2">Northern Ireland</h4>

<p><a href="mailto:admin@charitycommissionni.org.uk" class="govuk-link">admin@charitycommissionni.org.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Charity Commission for Northern Ireland
<br>257 Lough Road
<br>Lurgan
<br>BT66 6NQ
<br>
</p></div></div>
<h4 id="change-of-name">Change of name</h4>

<p>If you are an existing registered charity and your current and/or proposed new name includes one of these words, then your application should include a copy of the company’s letterhead (or alternative evidence) bearing the registered charity number. Subject to our normal examination checks, we will register or approve the name.</p>

<p>If you are a Northern Ireland company not registered with the Charity Commission for Northern Ireland (CCNI) and included in the HMRC ‘deemed list’, please provide evidence of the company’s tax-exempt status, or contact CCNI.</p>

<h2 id="charter">
<span class="number">21. </span>Charter</h2>',
                'is_document_required' => 1,
            ),
            52 =>
            array(
                'id' => 54,
                'name' => 'Charter',
                'description' => '<p>You can use this word in your proposed name provided it doesn’t imply it has a royal charter.  If the organisation does have a royal charter then you will need to provide appropriate evidence of its royal charter status.</p>',
                'is_document_required' => 1,
            ),
            53 =>
            array(
                'id' => 55,
                'name' => 'Chartered',
                'description' => '<p>To use this word in your proposed name, please provide a letter from your professional body confirming you are authorised to use this title.</p>

<p>If the use of this word is intended to represent the name of a professional body, you must provide evidence of its royal charter status.  If you’re already using this word in the name of an existing body, you cannot automatically use it in the name of another body.</p>

<p>These requirements do not apply to expressions such as ‘Chartered Flights’ or ‘Chartered Travel’.</p>',
                'is_document_required' => 1,
            ),
            54 =>
            array(
                'id' => 56,
                'name' => 'Chartered Accountant',
                'description' => '<p>To use this expression in your proposed name, please provide a letter or email of authorisation from your professional body.</p>

<h4 id="england-and-wales-2">England and Wales</h4>

<p><a href="mailto:contactus@icaew.com" class="govuk-link">contactus@icaew.com</a></p>

<div class="address"><div class="adr org fn"><p>

The Institute of Chartered Accountants in England and Wales
<br>Chartered Accountants\' Hall
<br>Moorgate Place
<br>London
<br>EC2R 6EA
<br>
</p></div></div>

<h4 id="northern-ireland-3">Northern Ireland</h4>

<p><a href="mailto:ca@charteredaccountants.ie" class="govuk-link">ca@charteredaccountants.ie</a></p>

<div class="address"><div class="adr org fn"><p>

Chartered Accountants Ireland
<br>The Linenhall
<br>32-38 Linenhall Street
<br>Belfast
<br>BT2 8BG
<br>
</p></div></div>

<h4 id="scotland-3">Scotland</h4>

<p><a href="mailto:enquiries@icas.org.uk" class="govuk-link">enquiries@icas.org.uk</a></p>

<div class="address"><div class="adr org fn"><p>

The Institute of Chartered Accountants of Scotland
<br>CA House
<br>21 Haymarket Yards
<br>Edinburgh
<br>EH12 5BH
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            55 =>
            array(
                'id' => 57,
                'name' => 'Chartered Certified Accountant',
                'description' => '<p>To use this expression in your proposed name, please provide a letter or email of authorisation from the Association of Chartered Certified Accountants.</p>

<p><a href="mailto:info@accaglobal.com" class="govuk-link">info@accaglobal.com</a></p>

<div class="address"><div class="adr org fn"><p>

110 Queen Street  
<br>Glasgow  
<br>G1 3BX  
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            56 =>
            array(
                'id' => 58,
                'name' => 'Chartered Management Accountant',
                'description' => '<p>You cannot use this expression in a company or LLP name. If you are a sole trader or general partnership intending to use this expression in a business name, please provide a letter or email of authorisation from the Chartered Institute of Management Accountants.</p>

<p><a href="mailto:cima.contact@aicpa-cima.com" class="govuk-link">cima.contact@aicpa-cima.com</a></p>

<div class="address"><div class="adr org fn"><p>

Chartered Institute of Management Accountants
<br>The Helicon
<br>One South Place
<br>London
<br>EC2M 2RB
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            57 =>
            array(
                'id' => 59,
                'name' => 'Chartered Secretary',
                'description' => '<p>To use this expression in your proposed name, please provide a letter or email of authorisation from the Chartered Governance Institute.</p>

<p><a href="mailto:info@icsa.org.uk" class="govuk-link">info@icsa.org.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Chartered Governance Institute 
<br>Saffron House
<br>6-10 Kirby Street
<br>London
<br>EC1N 8TS
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            58 =>
            array(
                'id' => 60,
                'name' => 'Chartered Surveyor',
                'description' => '<h4 id="use-in-a-company-name">Use in a company name</h4>

<p>As stated in <a rel="external" href="https://www.rics.org/globalassets/rics-website/media/news/consultations/rics-logo-use-and-designation-rules---exposure-draft-december-2018.pdf" class="govuk-link">RICS’ logo and designation rules</a>, you cannot use the title ‘Chartered Surveyor’ in a company name.</p>

<h4 id="use-in-a-business-name">Use in a business name</h4>

<p>To use this title in a business name, for example, the trading name of a sole practitioner or the trading name of a company, please provide a letter or email of non-objection from the RICS.</p>

<p><a href="mailto:contactrics@rics.org" class="govuk-link">contactrics@rics.org</a></p>

<div class="address"><div class="adr org fn"><p>

Royal Institution of Chartered Surveyors 
<br>12 Great George Street
<br>London 
<br>SW1P 3AD
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            59 =>
            array(
                'id' => 61,
                'name' => 'Child Maintenance',
                'description' => '<p>The use of these expressions in a proposed name could imply a connection with services provided by the Department for Work and Pensions or Northern Ireland Child Maintenance Services. To support your application, please include a letter or email of non-objection from the relevant body.</p>

<h4 id="england-wales-and-scotland">England, Wales and Scotland</h4>

<p><a rel="external" href="https://www2.dwp.gov.uk/contact-cmoptions/en/contact.asp" class="govuk-link">Online contact form</a></p>

<h4 id="northern-ireland-4">Northern Ireland</h4>

<p><a href="mailto:BELFAST.2012INBOUND@DFCNI.GOV.UK" class="govuk-link">BELFAST.2012INBOUND@DFCNI.GOV.UK</a></p>

<h2 id="comhairle--chomhairle--comhairlean--chomhairlean">
<span class="number">29. </span>Comhairle / Chomhairle / Comhairlean / Chomhairlean</h2>

<p>To use this word in your proposed name, the organisation should normally be a local authority, an independent advisory body, a deliberative assembly, or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Your application should include evidence to show that the organisation will be what it claims, and that it has the support of those it intends to govern, supervise, or look to it for expertise. You should also provide a letter or email of non-objection from a government body, a local authority or a relevant body.</p>
',
                'is_document_required' => 1,
            ),
            60 =>
            array(
                'id' => 62,
                'name' => 'Child Support',
                'description' => '<p>The use of these expressions in a proposed name could imply a connection with services provided by the Department for Work and Pensions or Northern Ireland Child Maintenance Services. To support your application, please include a letter or email of non-objection from the relevant body.</p>

<h4 id="england-wales-and-scotland">England, Wales and Scotland</h4>

<p><a rel="external" href="https://www2.dwp.gov.uk/contact-cmoptions/en/contact.asp" class="govuk-link">Online contact form</a></p>

<h4 id="northern-ireland-4">Northern Ireland</h4>

<p><a href="mailto:BELFAST.2012INBOUND@DFCNI.GOV.UK" class="govuk-link">BELFAST.2012INBOUND@DFCNI.GOV.UK</a></p>

<h2 id="comhairle--chomhairle--comhairlean--chomhairlean">
<span class="number">29. </span>Comhairle / Chomhairle / Comhairlean / Chomhairlean</h2>

<p>To use this word in your proposed name, the organisation should normally be a local authority, an independent advisory body, a deliberative assembly, or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Your application should include evidence to show that the organisation will be what it claims, and that it has the support of those it intends to govern, supervise, or look to it for expertise. You should also provide a letter or email of non-objection from a government body, a local authority or a relevant body.</p>
',
                'is_document_required' => 1,
            ),
            61 =>
            array(
                'id' => 63,
                'name' => 'Comhairle',
                'description' => '<p>To use this word in your proposed name, the organisation should normally be a local authority, an independent advisory body, a deliberative assembly, or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Your application should include evidence to show that the organisation will be what it claims, and that it has the support of those it intends to govern, supervise, or look to it for expertise. You should also provide a letter or email of non-objection from a government body, a local authority or a relevant body.</p>',
                'is_document_required' => 1,
            ),
            62 =>
            array(
                'id' => 64,
                'name' => 'Chomhairle',
                'description' => '<p>To use this word in your proposed name, the organisation should normally be a local authority, an independent advisory body, a deliberative assembly, or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Your application should include evidence to show that the organisation will be what it claims, and that it has the support of those it intends to govern, supervise, or look to it for expertise. You should also provide a letter or email of non-objection from a government body, a local authority or a relevant body.</p>',
                'is_document_required' => 1,
            ),
            63 =>
            array(
                'id' => 65,
                'name' => 'Comhairlean',
                'description' => '<p>To use this word in your proposed name, the organisation should normally be a local authority, an independent advisory body, a deliberative assembly, or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Your application should include evidence to show that the organisation will be what it claims, and that it has the support of those it intends to govern, supervise, or look to it for expertise. You should also provide a letter or email of non-objection from a government body, a local authority or a relevant body.</p>',
                'is_document_required' => 1,
            ),
            64 =>
            array(
                'id' => 66,
                'name' => 'Chomhairlean',
                'description' => '<p>To use this word in your proposed name, the organisation should normally be a local authority, an independent advisory body, a deliberative assembly, or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Your application should include evidence to show that the organisation will be what it claims, and that it has the support of those it intends to govern, supervise, or look to it for expertise. You should also provide a letter or email of non-objection from a government body, a local authority or a relevant body.</p>',
                'is_document_required' => 1,
            ),
            65 =>
            array(
                'id' => 67,
                'name' => 'Coimisean',
                'description' => '<p>To use this word in your proposed name, the organisation should normally be an independent advisory body, a deliberative assembly, or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Your application should include evidence to show that the company will be what it claims, and that it has the support of those it intends to govern, supervise, or look to it for expertise. You should also provide a letter or email of non-objection from a government body or a relevant body.</p>
',
                'is_document_required' => 1,
            ),
            66 =>
            array(
                'id' => 68,
                'name' => 'Coimisein',
                'description' => '<p>To use this word in your proposed name, the organisation should normally be an independent advisory body, a deliberative assembly, or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Your application should include evidence to show that the company will be what it claims, and that it has the support of those it intends to govern, supervise, or look to it for expertise. You should also provide a letter or email of non-objection from a government body or a relevant body.</p>
',
                'is_document_required' => 1,
            ),
            67 =>
            array(
                'id' => 69,
                'name' => 'Choimisean',
                'description' => '<p>To use this word in your proposed name, the organisation should normally be an independent advisory body, a deliberative assembly, or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Your application should include evidence to show that the company will be what it claims, and that it has the support of those it intends to govern, supervise, or look to it for expertise. You should also provide a letter or email of non-objection from a government body or a relevant body.</p>
',
                'is_document_required' => 1,
            ),
            68 =>
            array(
                'id' => 70,
                'name' => 'Chomisein',
                'description' => '<p>To use this word in your proposed name, the organisation should normally be an independent advisory body, a deliberative assembly, or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Your application should include evidence to show that the company will be what it claims, and that it has the support of those it intends to govern, supervise, or look to it for expertise. You should also provide a letter or email of non-objection from a government body or a relevant body.</p>
',
                'is_document_required' => 1,
            ),
            69 =>
            array(
                'id' => 71,
                'name' => 'Comisiwn',
                'description' => '<p>To use this word in your proposed name, the organisation should normally be an independent advisory body, a deliberative assembly, or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Your application should include evidence to show that the organisation will be what it claims, and that it has the support of those it intends to govern, supervise, or look to it for expertise. You should also provide a letter or email of non-objection from a government body or a relevant body.</p>
',
                'is_document_required' => 1,
            ),
            70 =>
            array(
                'id' => 72,
                'name' => 'Chomisiwn',
                'description' => '<p>To use this word in your proposed name, the organisation should normally be an independent advisory body, a deliberative assembly, or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Your application should include evidence to show that the organisation will be what it claims, and that it has the support of those it intends to govern, supervise, or look to it for expertise. You should also provide a letter or email of non-objection from a government body or a relevant body.</p>
',
                'is_document_required' => 1,
            ),
            71 =>
            array(
                'id' => 73,
                'name' => 'Gomisiwn',
                'description' => '<p>To use this word in your proposed name, the organisation should normally be an independent advisory body, a deliberative assembly, or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Your application should include evidence to show that the organisation will be what it claims, and that it has the support of those it intends to govern, supervise, or look to it for expertise. You should also provide a letter or email of non-objection from a government body or a relevant body.</p>
',
                'is_document_required' => 1,
            ),
            72 =>
            array(
                'id' => 74,
                'name' => 'Comisiwn y Senedd',
                'description' => '<p>To use this expression or anything similar in your proposed name, please provide a letter or email of non-objection from the Welsh Parliament.</p>

<p><a href="mailto:cysylltu@senedd.cymru" class="govuk-link">cysylltu@senedd.cymru</a></p>

<div class="address"><div class="adr org fn"><p>

Clerc y Senedd
<br>Senedd Cymru
<br>Bae Caerdydd
<br>CF99 1SN
<br>
</p></div></div>

<p><a href="mailto:contact@senedd.wales" class="govuk-link">contact@senedd.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Clerk of the Senedd 
<br>Welsh Parliament 
<br>Cardiff Bay
<br>Cardiff
<br>CF99 1SN
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            73 =>
            array(
                'id' => 75,
                'name' => 'Comisiwn Cynulliad Cenedlaethol Cymru',
                'description' => '<p>To use this expression or anything similar in your proposed name, please provide a letter or email of non-objection from the Welsh Parliament.</p>

<p><a href="mailto:cysylltu@senedd.cymru" class="govuk-link">cysylltu@senedd.cymru</a></p>

<div class="address"><div class="adr org fn"><p>

Clerc y Senedd
<br>Senedd Cymru
<br>Bae Caerdydd
<br>CF99 1SN
<br>
</p></div></div>

<p><a href="mailto:contact@senedd.wales" class="govuk-link">contact@senedd.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Clerk of the Senedd 
<br>Welsh Parliament 
<br>Cardiff Bay
<br>Cardiff
<br>CF99 1SN
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            74 =>
            array(
                'id' => 76,
                'name' => 'Commission',
                'description' => '<p>To use this word in your proposed name, the organisation should normally be an independent advisory body, a deliberative assembly; or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Your application should include evidence to show that the organisation will be what it claims, and that it has the support of those it intends to govern, supervise, or look to it for expertise. You should also provide a letter or email of non-objection from a government body or a relevant body.</p>
',
                'is_document_required' => 1,
            ),
            75 =>
            array(
                'id' => 77,
                'name' => 'Comptroller and Auditor General',
                'description' => '<p>To use this expression or anything similar in your proposed name, please provide a letter or email of non-objection from the National Audit Office.</p>

<p><a href="mailto:enquiries@nao.org.uk" class="govuk-link">enquiries@nao.org.uk</a></p>

<div class="address"><div class="adr org fn"><p>

National Audit Office
<br>157-197 Buckingham Palace Road
<br>London 
<br>SW1W 9SP
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            76 =>
            array(
                'id' => 78,
                'name' => 'Comptroller and Auditor General for Northern Ireland',
                'description' => '<p>To use this expression or anything similar in your proposed name, please provide a letter or email of non-objection from the Northern Ireland Audit Office.</p>

<p><a href="mailto:info@niauditoffice.gov.uk" class="govuk-link">info@niauditoffice.gov.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Northern Ireland Audit Office
<br>106 University Street
<br>Belfast 
<br>BT7 1EU
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            77 =>
            array(
                'id' => 79,
                'name' => 'Co-operative',
                'description' => '<p>To use ‘Co-operative’ in a company or business name, you will need to meet the following conditions:</p>

<ul>
<li>it should be owned and controlled by its members, customers or employees</li>
<li>membership should be voluntary and open i.e. it should not be artificially restricted in order to increase the value of the business or its assets</li>
<li>members’ should participate in the economic activity of the business</li>
<li>profits should be distributed equally amongst the members’ or at least in proportion to the extent each member has participated in the business</li>
<li>these principles should be included in the company’s articles of association or in the rules/constitution of an unincorporated business</li>
<li>any application to use this word in a business name should include a copy of the rules or constitution document</li>
</ul>',
                'is_document_required' => 1,
            ),
            78 =>
            array(
                'id' => 80,
                'name' => 'Co-operative Society',
                'description' => '<p>This expression can only be included in the name of a society registered under the Cooperative and Community Benefit Societies Act 2014 or the Credit Unions and Co-operative and Community Benefit Societies Act (Northern Ireland) 2016.</p>

<p>For further information, please contact the Financial Conduct Authority:</p>

<p><a href="mailto:consumer.queries@fca.org.uk" class="govuk-link">consumer.queries@fca.org.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Financial Conduct Authority
<br>25 The North Colonnade
<br>Canary Wharf
<br>London
<br>E14 5HS
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            79 =>
            array(
                'id' => 81,
                'name' => 'Council',
                'description' => '<p>To use this word in your proposed name, the organisation should normally be a local authority, an independent advisory body, a deliberative assembly, or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Your application should include evidence to show that the organisation will be what it claims and that it has the support of those it intends to govern, supervise, or look to it for expertise. You’ll also need to obtain a letter or email of non-objection from a government body or a relevant body.</p>',
                'is_document_required' => 1,
            ),
            80 =>
            array(
                'id' => 82,
                'name' => 'Cymru',
                'description' => '<h4 id="use-in-a-name-that-does-not-imply-a-connection-with-the-welsh-government">Use in a name that does not imply a connection with the Welsh Government</h4>

<p>Applications under the criteria set out in 1-3 below should be sent directly to Companies House.</p>

<ol>
<li>If you wish to use this word at the start of your proposed name you will need to demonstrate that the company is pre-eminent or very substantial in its sector. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with. The situation of the
company’s registered office must be in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is not the first word in your proposed name it will normally be allowed if the company’s registered office is in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes forenames or initials. This requirement does not apply to use in a business name.</li>
</ol>

<h4 id="use-in-a-name-that-could-imply-a-connection-with-the-welsh-government">Use in a name that could imply a connection with the Welsh Government</h4>

<p>If your proposed name could imply a connection with the Welsh Government, you will need to provide a letter of non-objection from the body shown below. The situation of the company’s registered office must be in Wales. In the case of a business name, the principal place of business must be in Wales. Please confirm the address with your application letter.</p>

<p>You should only contact the Welsh Government if the name is likely to imply a connection with this body.</p>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            81 =>
            array(
                'id' => 83,
                'name' => 'Chymru',
                'description' => '<h4 id="use-in-a-name-that-does-not-imply-a-connection-with-the-welsh-government">Use in a name that does not imply a connection with the Welsh Government</h4>

<p>Applications under the criteria set out in 1-3 below should be sent directly to Companies House.</p>

<ol>
<li>If you wish to use this word at the start of your proposed name you will need to demonstrate that the company is pre-eminent or very substantial in its sector. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with. The situation of the
company’s registered office must be in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is not the first word in your proposed name it will normally be allowed if the company’s registered office is in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes forenames or initials. This requirement does not apply to use in a business name.</li>
</ol>

<h4 id="use-in-a-name-that-could-imply-a-connection-with-the-welsh-government">Use in a name that could imply a connection with the Welsh Government</h4>

<p>If your proposed name could imply a connection with the Welsh Government, you will need to provide a letter of non-objection from the body shown below. The situation of the company’s registered office must be in Wales. In the case of a business name, the principal place of business must be in Wales. Please confirm the address with your application letter.</p>

<p>You should only contact the Welsh Government if the name is likely to imply a connection with this body.</p>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            82 =>
            array(
                'id' => 84,
                'name' => 'Gymru',
                'description' => '<h4 id="use-in-a-name-that-does-not-imply-a-connection-with-the-welsh-government">Use in a name that does not imply a connection with the Welsh Government</h4>

<p>Applications under the criteria set out in 1-3 below should be sent directly to Companies House.</p>

<ol>
<li>If you wish to use this word at the start of your proposed name you will need to demonstrate that the company is pre-eminent or very substantial in its sector. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with. The situation of the
company’s registered office must be in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is not the first word in your proposed name it will normally be allowed if the company’s registered office is in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes forenames or initials. This requirement does not apply to use in a business name.</li>
</ol>

<h4 id="use-in-a-name-that-could-imply-a-connection-with-the-welsh-government">Use in a name that could imply a connection with the Welsh Government</h4>

<p>If your proposed name could imply a connection with the Welsh Government, you will need to provide a letter of non-objection from the body shown below. The situation of the company’s registered office must be in Wales. In the case of a business name, the principal place of business must be in Wales. Please confirm the address with your application letter.</p>

<p>You should only contact the Welsh Government if the name is likely to imply a connection with this body.</p>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            83 =>
            array(
                'id' => 85,
                'name' => 'Nghymru',
                'description' => '<h4 id="use-in-a-name-that-does-not-imply-a-connection-with-the-welsh-government">Use in a name that does not imply a connection with the Welsh Government</h4>

<p>Applications under the criteria set out in 1-3 below should be sent directly to Companies House.</p>

<ol>
<li>If you wish to use this word at the start of your proposed name you will need to demonstrate that the company is pre-eminent or very substantial in its sector. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with. The situation of the
company’s registered office must be in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is not the first word in your proposed name it will normally be allowed if the company’s registered office is in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes forenames or initials. This requirement does not apply to use in a business name.</li>
</ol>

<h4 id="use-in-a-name-that-could-imply-a-connection-with-the-welsh-government">Use in a name that could imply a connection with the Welsh Government</h4>

<p>If your proposed name could imply a connection with the Welsh Government, you will need to provide a letter of non-objection from the body shown below. The situation of the company’s registered office must be in Wales. In the case of a business name, the principal place of business must be in Wales. Please confirm the address with your application letter.</p>

<p>You should only contact the Welsh Government if the name is likely to imply a connection with this body.</p>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            84 =>
            array(
                'id' => 86,
                'name' => 'Cymreig',
                'description' => '<h4 id="use-in-a-name-that-does-not-imply-a-connection-with-the-welsh-government">Use in a name that does not imply a connection with the Welsh Government</h4>

<p>Applications under the criteria set out in 1-3 below should be sent directly to Companies House.</p>

<ol>
<li>If you wish to use this word at the start of your proposed name you will need to demonstrate that the company is pre-eminent or very substantial in its sector. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with. The situation of the
company’s registered office must be in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is not the first word in your proposed name it will normally be allowed if the company’s registered office is in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes forenames or initials. This requirement does not apply to use in a business name.</li>
</ol>

<h4 id="use-in-a-name-that-could-imply-a-connection-with-the-welsh-government">Use in a name that could imply a connection with the Welsh Government</h4>

<p>If your proposed name could imply a connection with the Welsh Government, you will need to provide a letter of non-objection from the body shown below. The situation of the company’s registered office must be in Wales. In the case of a business name, the principal place of business must be in Wales. Please confirm the address with your application letter.</p>

<p>You should only contact the Welsh Government if the name is likely to imply a connection with this body.</p>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            85 =>
            array(
                'id' => 87,
                'name' => 'Cymraeg',
                'description' => '<h4 id="use-in-a-name-that-does-not-imply-a-connection-with-the-welsh-government">Use in a name that does not imply a connection with the Welsh Government</h4>

<p>Applications under the criteria set out in 1-3 below should be sent directly to Companies House.</p>

<ol>
<li>If you wish to use this word at the start of your proposed name you will need to demonstrate that the company is pre-eminent or very substantial in its sector. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with. The situation of the
company’s registered office must be in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is not the first word in your proposed name it will normally be allowed if the company’s registered office is in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes forenames or initials. This requirement does not apply to use in a business name.</li>
</ol>

<h4 id="use-in-a-name-that-could-imply-a-connection-with-the-welsh-government">Use in a name that could imply a connection with the Welsh Government</h4>

<p>If your proposed name could imply a connection with the Welsh Government, you will need to provide a letter of non-objection from the body shown below. The situation of the company’s registered office must be in Wales. In the case of a business name, the principal place of business must be in Wales. Please confirm the address with your application letter.</p>

<p>You should only contact the Welsh Government if the name is likely to imply a connection with this body.</p>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            86 =>
            array(
                'id' => 88,
                'name' => 'Chymraeg',
                'description' => '<h4 id="use-in-a-name-that-does-not-imply-a-connection-with-the-welsh-government">Use in a name that does not imply a connection with the Welsh Government</h4>

<p>Applications under the criteria set out in 1-3 below should be sent directly to Companies House.</p>

<ol>
<li>If you wish to use this word at the start of your proposed name you will need to demonstrate that the company is pre-eminent or very substantial in its sector. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with. The situation of the
company’s registered office must be in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is not the first word in your proposed name it will normally be allowed if the company’s registered office is in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes forenames or initials. This requirement does not apply to use in a business name.</li>
</ol>

<h4 id="use-in-a-name-that-could-imply-a-connection-with-the-welsh-government">Use in a name that could imply a connection with the Welsh Government</h4>

<p>If your proposed name could imply a connection with the Welsh Government, you will need to provide a letter of non-objection from the body shown below. The situation of the company’s registered office must be in Wales. In the case of a business name, the principal place of business must be in Wales. Please confirm the address with your application letter.</p>

<p>You should only contact the Welsh Government if the name is likely to imply a connection with this body.</p>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            87 =>
            array(
                'id' => 89,
                'name' => 'Chymreig',
                'description' => '<h4 id="use-in-a-name-that-does-not-imply-a-connection-with-the-welsh-government">Use in a name that does not imply a connection with the Welsh Government</h4>

<p>Applications under the criteria set out in 1-3 below should be sent directly to Companies House.</p>

<ol>
<li>If you wish to use this word at the start of your proposed name you will need to demonstrate that the company is pre-eminent or very substantial in its sector. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with. The situation of the
company’s registered office must be in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is not the first word in your proposed name it will normally be allowed if the company’s registered office is in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes forenames or initials. This requirement does not apply to use in a business name.</li>
</ol>

<h4 id="use-in-a-name-that-could-imply-a-connection-with-the-welsh-government">Use in a name that could imply a connection with the Welsh Government</h4>

<p>If your proposed name could imply a connection with the Welsh Government, you will need to provide a letter of non-objection from the body shown below. The situation of the company’s registered office must be in Wales. In the case of a business name, the principal place of business must be in Wales. Please confirm the address with your application letter.</p>

<p>You should only contact the Welsh Government if the name is likely to imply a connection with this body.</p>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            88 =>
            array(
                'id' => 90,
                'name' => 'Gymraeg',
                'description' => '<h4 id="use-in-a-name-that-does-not-imply-a-connection-with-the-welsh-government">Use in a name that does not imply a connection with the Welsh Government</h4>

<p>Applications under the criteria set out in 1-3 below should be sent directly to Companies House.</p>

<ol>
<li>If you wish to use this word at the start of your proposed name you will need to demonstrate that the company is pre-eminent or very substantial in its sector. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with. The situation of the
company’s registered office must be in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is not the first word in your proposed name it will normally be allowed if the company’s registered office is in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes forenames or initials. This requirement does not apply to use in a business name.</li>
</ol>

<h4 id="use-in-a-name-that-could-imply-a-connection-with-the-welsh-government">Use in a name that could imply a connection with the Welsh Government</h4>

<p>If your proposed name could imply a connection with the Welsh Government, you will need to provide a letter of non-objection from the body shown below. The situation of the company’s registered office must be in Wales. In the case of a business name, the principal place of business must be in Wales. Please confirm the address with your application letter.</p>

<p>You should only contact the Welsh Government if the name is likely to imply a connection with this body.</p>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            89 =>
            array(
                'id' => 91,
                'name' => 'Gymreig',
                'description' => '<h4 id="use-in-a-name-that-does-not-imply-a-connection-with-the-welsh-government">Use in a name that does not imply a connection with the Welsh Government</h4>

<p>Applications under the criteria set out in 1-3 below should be sent directly to Companies House.</p>

<ol>
<li>If you wish to use this word at the start of your proposed name you will need to demonstrate that the company is pre-eminent or very substantial in its sector. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with. The situation of the
company’s registered office must be in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is not the first word in your proposed name it will normally be allowed if the company’s registered office is in Wales. This does not apply if the word is used in a business name.</li>
<li>If this word is your surname it will normally be allowed if the proposed name includes forenames or initials. This requirement does not apply to use in a business name.</li>
</ol>

<h4 id="use-in-a-name-that-could-imply-a-connection-with-the-welsh-government">Use in a name that could imply a connection with the Welsh Government</h4>

<p>If your proposed name could imply a connection with the Welsh Government, you will need to provide a letter of non-objection from the body shown below. The situation of the company’s registered office must be in Wales. In the case of a business name, the principal place of business must be in Wales. Please confirm the address with your application letter.</p>

<p>You should only contact the Welsh Government if the name is likely to imply a connection with this body.</p>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            90 =>
            array(
                'id' => 92,
                'name' => 'Cyngor',
                'description' => '<p>To use this word in your proposed name, the organisation should normally be a local authority, an independent advisory body, a deliberative assembly, or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Please include evidence to show that the organisation will be what it claims, and that it has the support of those it intends to govern, supervise, or look to it for expertise.</p>',
                'is_document_required' => 1,
            ),
            91 =>
            array(
                'id' => 93,
                'name' => 'Chyngor',
                'description' => '<p>To use this word in your proposed name, the organisation should normally be a local authority, an independent advisory body, a deliberative assembly, or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Please include evidence to show that the organisation will be what it claims, and that it has the support of those it intends to govern, supervise, or look to it for expertise.</p>',
                'is_document_required' => 1,
            ),
            92 =>
            array(
                'id' => 94,
                'name' => 'Gyngor',
                'description' => '<p>To use this word in your proposed name, the organisation should normally be a local authority, an independent advisory body, a deliberative assembly, or a governing, supervisory or representative body of an activity, trade, business or profession.</p>

<p>Please include evidence to show that the organisation will be what it claims, and that it has the support of those it intends to govern, supervise, or look to it for expertise.</p>',
                'is_document_required' => 1,
            ),
            93 =>
            array(
                'id' => 95,
                'name' => 'Cynulliad Cenedlaethol Cymru',
                'description' => 'p>To use this expression or anything similar in your proposed name, please provide a letter or email of non-objection from the body shown below.</p>

<p><a href="mailto:cysylltu@senedd.cymru" class="govuk-link">cysylltu@senedd.cymru </a></p>

<div class="address"><div class="adr org fn"><p>

Clerc y Senedd
<br>Senedd Cymru 
<br>Bae Caerdydd 
<br>Caerdydd 
<br>CF99 1NA 
<br>
</p></div></div>

<p><a href="mailto:contact@senedd.wales" class="govuk-link">contact@senedd.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Clerk of the Senedd
<br>Senedd Wales
<br>Cardiff Bay 
<br>Cardiff 
<br>CF99 1NA 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            94 =>
            array(
                'id' => 96,
                'name' => 'Dental',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the General Dental Council.</p>

<p><a href="mailto:businessnames@gdc-uk.org" class="govuk-link">businessnames@gdc-uk.org</a></p>

<div class="address"><div class="adr org fn"><p>

General Dental Council
<br>Registration Development
<br>37 Wimpole Street
<br>London
<br>W1G 8DQ
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            95 =>
            array(
                'id' => 97,
                'name' => 'Dentistry',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the General Dental Council.</p>

<p><a href="mailto:businessnames@gdc-uk.org" class="govuk-link">businessnames@gdc-uk.org</a></p>

<div class="address"><div class="adr org fn"><p>

General Dental Council
<br>Registration Development
<br>37 Wimpole Street
<br>London
<br>W1G 8DQ
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            96 =>
            array(
                'id' => 98,
                'name' => 'Diùc',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Scottish Government:</p>

<p>To speed up your application, please include:</p>

<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>

<p><a href="mailto:protocol@gov.scot" class="govuk-link">protocol@gov.scot</a></p>

<div class="address"><div class="adr org fn"><p>

Scottish Government
<br>Protocol and Honours Team
<br>Room 4N.02
<br>St. Andrew’s House
<br>Regent Road
<br>Edinburgh 
<br>EH1 3DG
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            97 =>
            array(
                'id' => 99,
                'name' => 'Dhiùc',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Scottish Government:</p>

<p>To speed up your application, please include:</p>

<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>

<p><a href="mailto:protocol@gov.scot" class="govuk-link">protocol@gov.scot</a></p>

<div class="address"><div class="adr org fn"><p>

Scottish Government
<br>Protocol and Honours Team
<br>Room 4N.02
<br>St. Andrew’s House
<br>Regent Road
<br>Edinburgh 
<br>EH1 3DG
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            98 =>
            array(
                'id' => 100,
                'name' => 'Ban-diùc',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Scottish Government:</p>

<p>To speed up your application, please include:</p>

<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>

<p><a href="mailto:protocol@gov.scot" class="govuk-link">protocol@gov.scot</a></p>

<div class="address"><div class="adr org fn"><p>

Scottish Government
<br>Protocol and Honours Team
<br>Room 4N.02
<br>St. Andrew’s House
<br>Regent Road
<br>Edinburgh 
<br>EH1 3DG
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            99 =>
            array(
                'id' => 101,
                'name' => 'Bhan-Dhiùc',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Scottish Government:</p>

<p>To speed up your application, please include:</p>

<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>

<p><a href="mailto:protocol@gov.scot" class="govuk-link">protocol@gov.scot</a></p>

<div class="address"><div class="adr org fn"><p>

Scottish Government
<br>Protocol and Honours Team
<br>Room 4N.02
<br>St. Andrew’s House
<br>Regent Road
<br>Edinburgh 
<br>EH1 3DG
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            100 =>
            array(
                'id' => 102,
                'name' => 'Diùcan',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Scottish Government:</p>

<p>To speed up your application, please include:</p>

<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>

<p><a href="mailto:protocol@gov.scot" class="govuk-link">protocol@gov.scot</a></p>

<div class="address"><div class="adr org fn"><p>

Scottish Government
<br>Protocol and Honours Team
<br>Room 4N.02
<br>St. Andrew’s House
<br>Regent Road
<br>Edinburgh 
<br>EH1 3DG
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            101 =>
            array(
                'id' => 103,
                'name' => 'Dhiùcan',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Scottish Government:</p>

<p>To speed up your application, please include:</p>

<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>

<p><a href="mailto:protocol@gov.scot" class="govuk-link">protocol@gov.scot</a></p>

<div class="address"><div class="adr org fn"><p>

Scottish Government
<br>Protocol and Honours Team
<br>Room 4N.02
<br>St. Andrew’s House
<br>Regent Road
<br>Edinburgh 
<br>EH1 3DG
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            102 =>
            array(
                'id' => 104,
                'name' => 'Ban-Diùcan',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Scottish Government:</p>

<p>To speed up your application, please include:</p>

<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>

<p><a href="mailto:protocol@gov.scot" class="govuk-link">protocol@gov.scot</a></p>

<div class="address"><div class="adr org fn"><p>

Scottish Government
<br>Protocol and Honours Team
<br>Room 4N.02
<br>St. Andrew’s House
<br>Regent Road
<br>Edinburgh 
<br>EH1 3DG
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            103 =>
            array(
                'id' => 105,
                'name' => 'Bhan-Dhiùcan',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Scottish Government:</p>

<p>To speed up your application, please include:</p>

<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>

<p><a href="mailto:protocol@gov.scot" class="govuk-link">protocol@gov.scot</a></p>

<div class="address"><div class="adr org fn"><p>

Scottish Government
<br>Protocol and Honours Team
<br>Room 4N.02
<br>St. Andrew’s House
<br>Regent Road
<br>Edinburgh 
<br>EH1 3DG
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            104 =>
            array(
                'id' => 106,
                'name' => 'Dug',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Welsh Government.</p>

<p>To speed up your application, please include:</p>

<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            105 =>
            array(
                'id' => 107,
                'name' => 'Duges',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Welsh Government.</p>

<p>To speed up your application, please include:</p>

<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            106 =>
            array(
                'id' => 108,
                'name' => 'Ddug',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Welsh Government.</p>

<p>To speed up your application, please include:</p>

<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            107 =>
            array(
                'id' => 109,
                'name' => 'Dduges',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Welsh Government.</p>

<p>To speed up your application, please include:</p>

<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            108 =>
            array(
                'id' => 110,
                'name' => 'Duke',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the relevant body.</p>

<p>To speed up your application, please include:</p>

<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>

<h4 id="england--northern-ireland">England &amp; Northern Ireland</h4>

<p><a href="mailto:royalnames@cabinetoffice.gov.uk" class="govuk-link">royalnames@cabinetoffice.gov.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Cabinet Office
<br>Constitutional Policy Team
<br>4th Floor (Orange Zone)
<br>1 Horse Guards Road
<br>London
<br>SW1A 2HQ
<br>
</p></div></div>

<h4 id="wales-1">Wales</h4>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ
<br>
</p></div></div>

<h4 id="scotland-4">Scotland</h4>

<p><a href="mailto:protocol@gov.scot" class="govuk-link">protocol@gov.scot</a></p>

<div class="address"><div class="adr org fn"><p>

Scottish Government
<br>Protocol and Honours Team
<br>Room 4N.02
<br>St. Andrew’s House
<br>Regent Road
<br>Edinburgh 
<br>EH1 3DG 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            109 =>
            array(
                'id' => 111,
                'name' => 'Duchess',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the relevant body.</p>

<p>To speed up your application, please include:</p>

<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>

<h4 id="england--northern-ireland">England &amp; Northern Ireland</h4>

<p><a href="mailto:royalnames@cabinetoffice.gov.uk" class="govuk-link">royalnames@cabinetoffice.gov.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Cabinet Office
<br>Constitutional Policy Team
<br>4th Floor (Orange Zone)
<br>1 Horse Guards Road
<br>London
<br>SW1A 2HQ
<br>
</p></div></div>

<h4 id="wales-1">Wales</h4>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ
<br>
</p></div></div>

<h4 id="scotland-4">Scotland</h4>

<p><a href="mailto:protocol@gov.scot" class="govuk-link">protocol@gov.scot</a></p>

<div class="address"><div class="adr org fn"><p>

Scottish Government
<br>Protocol and Honours Team
<br>Room 4N.02
<br>St. Andrew’s House
<br>Regent Road
<br>Edinburgh 
<br>EH1 3DG 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            110 =>
            array(
                'id' => 112,
                'name' => 'Ei Fawrhydi',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Welsh Government.</p>

<p>To speed up your application, please include:</p>

<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            111 =>
            array(
                'id' => 113,
                'name' => 'Ei Mawrhydi',
                'description' => '<p>To use this word in your proposed name, please provide a letter or email of non-objection from the Welsh Government.</p>

<p>To speed up your application, please include:</p>

<ul>
<li>the reasons you wish to use this word</li>
<li>whether the organisation already exists, its current activities and future plans</li>
<li>details of any royal or government associations</li>
<li>details of leading members and membership numbers</li>
<li>if the name represents a pub, evidence of location and length of time in existence</li>
<li>evidence, if the word is a surname</li>
<li>any other relevant information</li>
</ul>

<p><a href="mailto:brandingqueries@gov.wales" class="govuk-link">brandingqueries@gov.wales</a></p>

<div class="address"><div class="adr org fn"><p>

Branding Manager
<br>Communications Division
<br>Welsh Government
<br>Cathays Park
<br>CF10 3NQ 
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            112 =>
            array(
                'id' => 114,
                'name' => 'England',
                'description' => '<h4 id="use-in-a-name-that-does-not-imply-a-connection-with-a-uk-government-body">Use in a name that does not imply a connection with a UK government body</h4>

<p>Applications made under the criteria set out in 1-3 below should be sent directly to Companies House.</p>

<ol>
<li>If you wish to use this word at the start of your proposed name or ‘of England’ anywhere in the name, you will need to demonstrate that the company is pre-eminent or very substantial in its sector. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with. The situation of the company’s registered office should be in England. In the case of a business name, the principal place of business must be in England and please confirm the address in your application letter.</li>
<li>If this word is not the first word in your proposed name it will normally be allowed if the company’s registered office is in England. In the case of a business name, the principal place of business must be in England. Please confirm the address in your application letter.</li>
<li>If this word is your surname, it will normally be approved provided the proposed name includes forenames or initials.</li>
</ol>

<h4 id="use-in-a-name-that-could-imply-a-connection-with-a-uk-government-body">Use in a name that could imply a connection with a UK government body</h4>

<p>If your proposed name is likely to imply a connection with a UK government department or body, you will need to provide a letter or email of non-objection from that body and include a copy when you send your application to Companies House. The situation of the company’s registered office should be in England. In the case of a business name, the principal place of business must be in England and the address should be confirmed in your application letter.</p>

<p>You should only contact a UK government department or body if the name is likely to imply a connection with that body.</p>',
                'is_document_required' => 1,
            ),
            113 =>
            array(
                'id' => 115,
                'name' => 'of England',
                'description' => '<h4 id="use-in-a-name-that-does-not-imply-a-connection-with-a-uk-government-body">Use in a name that does not imply a connection with a UK government body</h4>

<p>Applications made under the criteria set out in 1-3 below should be sent directly to Companies House.</p>

<ol>
<li>If you wish to use this word at the start of your proposed name or ‘of England’ anywhere in the name, you will need to demonstrate that the company is pre-eminent or very substantial in its sector. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with. The situation of the company’s registered office should be in England. In the case of a business name, the principal place of business must be in England and please confirm the address in your application letter.</li>
<li>If this word is not the first word in your proposed name it will normally be allowed if the company’s registered office is in England. In the case of a business name, the principal place of business must be in England. Please confirm the address in your application letter.</li>
<li>If this word is your surname, it will normally be approved provided the proposed name includes forenames or initials.</li>
</ol>

<h4 id="use-in-a-name-that-could-imply-a-connection-with-a-uk-government-body">Use in a name that could imply a connection with a UK government body</h4>

<p>If your proposed name is likely to imply a connection with a UK government department or body, you will need to provide a letter or email of non-objection from that body and include a copy when you send your application to Companies House. The situation of the company’s registered office should be in England. In the case of a business name, the principal place of business must be in England and the address should be confirmed in your application letter.</p>

<p>You should only contact a UK government department or body if the name is likely to imply a connection with that body.</p>',
                'is_document_required' => 1,
            ),
            114 =>
            array(
                'id' => 116,
                'name' => 'English',
                'description' => '<h4 id="use-in-a-name-that-does-not-imply-a-connection-with-a-uk-government-body">Use in a name that does not imply a connection with a UK government body</h4>

<p>Applications made under the criteria set out in 1-3 below should be sent directly to Companies House.</p>

<ol>
<li>If you wish to use this word at the start of your proposed name or ‘of England’ anywhere in the name, you will need to demonstrate that the company is pre-eminent or very substantial in its sector. You should also provide the views or supporting evidence from an independent source, such as a trade association or other private or public body you work with. The situation of the company’s registered office should be in England. In the case of a business name, the principal place of business must be in England and please confirm the address in your application letter.</li>
<li>If this word is not the first word in your proposed name it will normally be allowed if the company’s registered office is in England. In the case of a business name, the principal place of business must be in England. Please confirm the address in your application letter.</li>
<li>If this word is your surname, it will normally be approved provided the proposed name includes forenames or initials.</li>
</ol>

<h4 id="use-in-a-name-that-could-imply-a-connection-with-a-uk-government-body">Use in a name that could imply a connection with a UK government body</h4>

<p>If your proposed name is likely to imply a connection with a UK government department or body, you will need to provide a letter or email of non-objection from that body and include a copy when you send your application to Companies House. The situation of the company’s registered office should be in England. In the case of a business name, the principal place of business must be in England and the address should be confirmed in your application letter.</p>

<p>You should only contact a UK government department or body if the name is likely to imply a connection with that body.</p>',
                'is_document_required' => 1,
            ),
            115 =>
            array(
                'id' => 117,
                'name' => 'Federation',
                'description' => '<p>A federation should be a body established to support its members who operate in a specific business sector. To use this word in your proposed name, the company should normally be limited by guarantee. A one-member one-vote clause and a non-profit distribution clause should be included in the articles of association. The non-profit clause provides that any profits are used to further the objects of the company and not paid to the members as dividends.</p>

<p>To use this word in a business name, the articles, constitution or relevant governance document should include similar provisions. Please include a copy of this document with your application.</p>',
                'is_document_required' => 1,
            ),
            116 =>
            array(
                'id' => 118,
                'name' => 'Financial Conduct Authority',
                'description' => '<p>To use this expression or anything similar in your proposed name, please provide a letter or email of non-objection from the Financial Conduct Authority.</p>

<p><a href="mailto:SensitiveBusinessN@fca.org.uk" class="govuk-link">SensitiveBusinessN@fca.org.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Sensitive Business Names Team
<br>Financial Conduct Authority
<br>12 Endeavour Square 
<br>London 
<br>E20 1JN
<br>
</p></div></div>',
                'is_document_required' => 1,
            ),
            117 =>
            array(
                'id' => 119,
                'name' => 'Financial Reporting Council',
                'description' => '<p>To use this expression or anything similar in your proposed name, please provide a letter or email of non-objection from the Financial Reporting Council.</p>

<p><a href="mailto:enquiries@frc.org.uk" class="govuk-link">enquiries@frc.org.uk</a></p>

<div class="address"><div class="adr org fn"><p>

Financial Reporting Council
<br>8th Floor
<br>125 London Wall
<br>London
<br>EC2Y 5AS 
<br>
</p></div></div>
',
                'is_document_required' => 1,
            ),
        ));
    }
}
