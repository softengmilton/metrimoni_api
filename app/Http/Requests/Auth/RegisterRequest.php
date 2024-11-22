<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'basicInfo.customerId'       => 'required',
            'basicInfo.phone'       => 'required',
            'basicInfo.email'            => 'required|email|unique:users,email',
            'basicInfo.password'         => 'required|string|min:6',

            'personalDetails.name' => 'required',
            'personalDetails.age' => 'required',
            'personalDetails.height' => 'required',
            'personalDetails.skin_colour' => 'required',
            'personalDetails.figure' => 'required',
            'personalDetails.citizenship' => 'required',
            'personalDetails.education' => 'required',
            'personalDetails.profession' => 'required',
            'personalDetails.salary' => 'required',
            'personalDetails.region' => 'required',
            // 'personalDetails.council' => 'required',
            'personalDetails.houseType' => 'required',
            'personalDetails.marital_status' => 'required',
            'personalDetails.gender' => 'required',
            'personalDetails.religious_mazhab' => 'required',
            'personalDetails.religious_practice' => 'required',
            'personalDetails.prayers' => 'required',
            'personalDetails.last_fajr_prayer' => 'required',
            'personalDetails.can_recite_quran' => 'required',
            'personalDetails.last_read_quran' => 'required',
            'personalDetails.driving_license' => 'required',
            'personalDetails.owns_car' => 'required',
            'personalDetails.disability' => 'required',
            'personalDetails.umrah_hajj' => 'required',
            'personalDetails.language' => 'required',
            'personalDetails.marriage_intentions' => 'required',
            'personalDetails.wear_religious_dress' => 'required',
            'personalDetails.smoking' => 'required',
            'personalDetails.cooking_skills' => 'required',

            // Family Details
            'familyDetails.parents_status' => 'required',
            'familyDetails.father_name' => 'required',
            'familyDetails.mother_name' => 'required',
            'familyDetails.siblings' => 'required',
            'familyDetails.working_members' => 'required',
            'familyDetails.backhome_city' => 'required',

            // Spouse Expectations
            'spouseExpectation.spouse_citizen' => 'required',
            'spouseExpectation.spouse_occupation' => 'required',
            'spouseExpectation.spouse_skinColour' => 'required',
            'spouseExpectation.spouse_heightPreference' => 'required',
            'spouseExpectation.spouse_educationPreference' => 'required',
            'spouseExpectation.spouse_religiousDress' => 'required',
            'spouseExpectation.spouse_agePreference' => 'required',
            'spouseExpectation.spouse_areaOfChoice' => 'required',
            // 'spouseExpectation.preferCouncil' => 'required',
            'spouseExpectation.spouse_marital_status' => 'required',
            'spouseExpectation.spouse_considerDivorce' => 'required',
            'spouseExpectation.spouse_considerDivorceWithChildren' => 'required',
            'spouseExpectation.spouse_considerWithDisabilities' => 'required',
            'spouseExpectation.spouse_considerNonUkCitizen' => 'required',
            'spouseExpectation.spouse_willingToRelocate' => 'required',
            'spouseExpectation.spouse_livingArrangements' => 'required',


            'agreeMent.weddingPlan' => 'required',
            'agreeMent.aboutYourself' => 'required',
            'agreeMent.guardianName' => 'required',
            'agreeMent.guardianRelationship' => 'required',
            'agreeMent.guardianWhatsApp' => 'required',

            'agreeMent.agreement' => 'required',
            'agreeMent.photo' => 'required',
        ];
    }

    /**
     * Get custom messages for validation errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            // Basic Info
            'basicInfo.customerId.required' => 'The customer ID is required.',
            'basicInfo.phone.required' => 'The phone number is required.',
            'basicInfo.email.required' => 'The email address is required.',
            'basicInfo.email.email' => 'Please provide a valid email address.',
            'basicInfo.email.unique' => 'This email is already taken, please use a different one.',
            'basicInfo.password.required' => 'The password is required.',
            'basicInfo.password.min' => 'The password must be at least 6 characters.',


            // Personal Information
            'personalDetails.name.required' => 'The name is required.',
            'personalDetails.age.required' => 'Please provide your age.',
            'personalDetails.height.required' => 'Please provide your height.',
            'personalDetails.skin_colour.required' => 'Please specify your skin colour.',
            'personalDetails.figure.required' => 'Please specify your figure.',
            'personalDetails.citizenship.required' => 'Please specify your citizenship.',
            'personalDetails.education.required' => 'Please provide your education.',
            'personalDetails.profession.required' => 'Please provide your profession.',
            'personalDetails.salary.required' => 'Please provide your salary.',
            'personalDetails.region.required' => 'Please specify your region.',
            'personalDetails.council.required' => 'Please provide your council.',
            'personalDetails.houseType.required' => 'Please specify your house type.',
            'personalDetails.marital_status.required' => 'Please specify your marital status.',
            'personalDetails.gender.required' => 'Please specify your gender.',
            'personalDetails.religious_mazhab.required' => 'Please provide your religious mazhab.',
            'personalDetails.religious_practice.required' => 'Please specify your religious practice.',
            'personalDetails.prayers.required' => 'Please specify your prayer habits.',
            'personalDetails.last_fajr_prayer.required' => 'Please provide information about your last Fajr prayer.',
            'personalDetails.can_recite_quran.required' => 'Please specify if you can recite the Quran.',
            'personalDetails.last_read_quran.required' => 'Please provide the last time you read the Quran.',
            'personalDetails.driving_license.required' => 'Please specify if you have a driving license.',
            'personalDetails.owns_car.required' => 'Please specify if you own a car.',
            'personalDetails.disability.required' => 'Please specify if you have any disability.',
            'personalDetails.umrah_hajj.required' => 'Please specify if you have performed Umrah or Hajj.',
            'personalDetails.language.required' => 'Please specify your language.',
            'personalDetails.marriage_intentions.required' => 'Please specify your marriage intentions.',
            'personalDetails.wear_religious_dress.required' => 'Please specify if you wear religious dress.',
            'personalDetails.smoking.required' => 'Please specify if you smoke.',
            'personalDetails.cooking_skills.required' => 'Please specify if you have cooking skills.',

            // Family Details
            'familyDetails.parents_status.required' => 'Please specify your parents’ status.',
            'familyDetails.father_name.required' => 'Please provide your father\'s name.',
            'familyDetails.mother_name.required' => 'Please provide your mother\'s name.',
            'familyDetails.siblings.required' => 'Please specify the number of siblings you have.',
            'familyDetails.working_members.required' => 'Please specify how many family members are working.',
            'familyDetails.backhome_city.required' => 'Please specify your city back home.',

            // Spouse Expectations
            'spouseExpectation.spouse_citizen.required' => 'Please specify if you are a citizen.',
            'spouseExpectation.spouse_occupation.required' => 'Please specify your occupation.',
            'spouseExpectation.spouse_skinColour.required' => 'Please specify your skin colour preference.',
            'spouseExpectation.spouse_heightPreference.required' => 'Please specify your height preference.',
            'spouseExpectation.spouse_educationPreference.required' => 'Please specify your education preference.',
            'spouseExpectation.spouse_religiousDress.required' => 'Please specify if you want your spouse to wear religious dress.',
            'spouseExpectation.spouse_agePreference.required' => 'Please specify your age preference.',
            'spouseExpectation.spouse_areaOfChoice.required' => 'Please specify your area of choice for your spouse.',
            'spouseExpectation.spouse_preferCouncil.required' => 'Please specify if you prefer a certain council.',
            'spouseExpectation.spouse_marital_status.required' => 'Please specify your preference for your spouse\'s marital status.',
            'spouseExpectation.spouse_considerDivorce.required' => 'Please specify if you are willing to consider a divorced person.',
            'spouseExpectation.spouse_considerDivorceWithChildren.required' => 'Please specify if you are willing to consider a divorced person with children.',
            'spouseExpectation.spouse_considerWithDisabilities.required' => 'Please specify if you are willing to consider a person with disabilities.',
            'spouseExpectation.spouse_considerNonUkCitizen.required' => 'Please specify if you are willing to consider a non-UK citizen.',
            'spouseExpectation.spouse_willingToRelocate.required' => 'Please specify if you are willing to relocate.',
            'spouseExpectation.spouse_livingArrangements.required' => 'Please specify your preferred living arrangements.',


            'agreeMent.weddingPlan.required' => 'Please specify if you have a wedding plan.',
            'agreeMent.aboutYourself.required' => 'Please provide information about yourself.',
            'agreeMent.guardianName.required' => 'Please provide the name of your guardian.',
            'agreeMent.guardianRelationship.required' => 'Please specify your guardian\'s relationship to you.',
            'agreeMent.guardianWhatsApp.required' => 'Please provide your guardian\'s WhatsApp number.',

            // ID Verification
            'agreeMent.agreement.required' => 'You must agree to the terms and conditions.',
            'agreeMent.photo.required' => 'Please upload a photo for verification.',
        ];
    }
}
