<?php

namespace Database\Factories;

use App\Models\Community;
use App\Models\Region;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfile>
 */
class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = UserProfile::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'age' => $this->faker->randomElement(['18-20', '21-30', '31-40']),
            'role' => $this->faker->randomElement(['bride', 'groom']),
            'height' => $this->faker->randomElement(["4'0''-4'6''", "5'4''-6'0''"]),
            'skin_colour' => $this->faker->randomElement(['Brown', 'Fair']),
            'figure' => $this->faker->randomElement(['Slim', 'Healthy']),
            'citizenship' => $this->faker->randomElement(['British Citizen', 'Non-British']),
            'education' => $this->faker->randomElement(['Secondary School', 'Undergraduate Degree']),
            'profession' => $this->faker->randomElement(['Accountant', 'Doctor']),
            'salary' => $this->faker->randomElement(['£5,000 - £10,000', '£50,001 - £100,000']),
            'region_id' => $this->faker->randomElement(Region::pluck('id')->toArray()),
            'community_id' =>$this->faker->randomElement(Community::pluck('id')->toArray()),
            'houseType' => $this->faker->randomElement(['Own property', 'Council property']),
            'marital_status' => $this->faker->randomElement(['Never married', 'Widowed']),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'religious_mazhab' => $this->faker->randomElement(['Hanafi', 'Shafi']),
            'religious_practice' => $this->faker->randomElement(['Very religious', 'Not practising']),
            'prayers' => $this->faker->randomElement(['Weekly minimum of 35 salah']),
            'last_fajr_prayer' => $this->faker->randomElement(['Every day', '1 month ago']),
            'can_recite_quran' => $this->faker->randomElement(['Yes', 'No']),
            'last_read_quran' => $this->faker->randomElement(['Every day', '1 year ago']),
            'driving_license' => $this->faker->randomElement(['Yes', 'No']),
            'owns_car' => $this->faker->randomElement(['Yes', 'No']),
            'disability' => $this->faker->randomElement(['Yes', 'No']),
            'umrah_hajj' => $this->faker->randomElement(['Completed', 'Not Yet']),
            'language' => $this->faker->randomElement(['English & Sylheti', 'Only English']),
            'marriage_intentions' => $this->faker->randomElement(['Ready for marriage', 'Within 6 months']),
            'wear_religious_dress' => $this->faker->randomElement(['Yes', 'Modest', 'No']),
            'smoking' => $this->faker->randomElement(['Smoker', 'Non-smoker']),
            'cooking_skills' => $this->faker->randomElement(['Yes, I am a professional chef', 'I don’t know cooking at all']),
            'parents_status' => $this->faker->randomElement(['Both Alive', 'Separated']),
            'father_name' => $this->faker->name('male'),
            'mother_name' => $this->faker->name('female'),
            'siblings' => $this->faker->numberBetween(0, 10),
            'working_members' => $this->faker->numberBetween(0, 5),
            'backhome_city' => $this->faker->randomElement(['Sylhet', 'Non-Sylheti']),
            'spouse_citizen' => $this->faker->randomElement(['British Citizen', 'Non-British']),
            'spouse_occupation' => $this->faker->randomElement(['Accountant', 'Doctor']),
            'spouse_skinColour' => $this->faker->randomElement(['Brown', 'Fair']),
            'spouse_heightPreference' => $this->faker->randomElement(["5'0''-5'6''", "5'6''-6'2''"]),
            'spouse_educationPreference' => $this->faker->randomElement(['Secondary School', 'Undergraduate Degree']),
            'spouse_religiousDress' => $this->faker->randomElement(['Yes', 'Modest', 'No']),
            'spouse_agePreference' => $this->faker->randomElement(['18-25', '26-35']),
            'spouse_region_id' => $this->faker->randomElement(Region::pluck('id')->toArray()),
            'spouse_community_id' => $this->faker->randomElement(Community::pluck('id')->toArray()),
            'spouse_marital_status' => $this->faker->randomElement(['Never married', 'Widowed']),
            'spouse_considerDivorce' => $this->faker->randomElement(['Yes', 'No']),
            'spouse_considerDivorceWithChildren' => $this->faker->randomElement(['Yes', 'No']),
            'spouse_considerWithDisabilities' => $this->faker->randomElement(['Yes', 'No']),
            'spouse_considerNonUkCitizen' => $this->faker->randomElement(['Yes', 'No']),
            'spouse_willingToRelocate' => $this->faker->randomElement(['Yes', 'No']),
            'spouse_livingArrangements' => $this->faker->randomElement(['Own property', 'Renting']),
            'weddingPlan' => $this->faker->randomElement(['Simple', 'Grand']),
            'aboutYourself' => $this->faker->paragraph(),
            'guardianName' => $this->faker->name(),
            'guardianRelationship' => $this->faker->randomElement(['Father', 'Mother', 'Uncle']),
            'guardianWhatsApp' => $this->faker->phoneNumber(),
            'agreement' => $this->faker->boolean(),
            'id_verified' => $this->faker->boolean(),
            'user_id' => \App\Models\User::factory(), // Reference to a User model
        ];
    }
}
