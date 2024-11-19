<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('age_group'); // Example: "18-20", "21-30"
            $table->string('height'); // Example: "4'0''-4'6''", "5'4''-6'0''"
            $table->string('skin_colour'); // Example: "Brown", "Fair"
            $table->string('figure'); // Example: "Slim", "Healthy"
            $table->string('citizenship'); // Example: "British Citizen", "Non-British"
            $table->string('educational_qualification'); // Example: "Secondary School", "Undergraduate Degree"
            $table->string('profession'); // Example: "Accountant", "Doctor"
            $table->string('salary_range'); // Example: "£5,000 - £10,000", "£50,001 - £100,000"
            $table->string('region'); // Example: "Greater London", "West Midlands"
            $table->string('council')->nullable(); // Example: "Hounslow", can be null
            $table->string('house_type'); // Example: "Own property", "Council property"
            $table->string('marital_status'); // Example: "Never married", "Widowed"
            $table->string('gender'); // Example: "Male", "Female"
            $table->string('religious_mazhab'); // Example: "Hanafi", "Shafi"
            $table->string('religious_practice'); // Example: "Very religious", "Not practising"
            $table->string('prayers'); // Example: "Weekly minimum of 35 salah"
            $table->string('last_fajr_prayer'); // Example: "Every day", "1 month ago"
            $table->string('can_recite_quran'); // Example: "Yes", "No"
            $table->string('last_read_quran'); // Example: "Every day", "1 year ago"
            $table->string('has_driving_license'); // Example: "Yes", "No"
            $table->string('owns_car'); // Example: "Yes", "No"
            $table->string('disability'); // Example: "Yes", "No"
            $table->string('umrah_hajj'); // Example: "Completed", "Not Yet"
            $table->string('language'); // Example: "English & Sylheti", "Only English"
            $table->string('marriage_intentions'); // Example: "Ready for marriage", "Within 6 months"
            $table->string('wear_religious_dress'); // Example: "Yes", "Modest", "No"
            $table->string('smoking'); // Example: "Smoker", "Non-smoker"
            $table->string('knows_cooking'); // Example: "Yes, I am a professional chef", "I don’t know cooking at all"

            // Family Details
            $table->string('parents_status'); // Example: "Both Alive", "Separated"
            $table->string('father_name')->nullable(); // Father name (nullable)
            $table->string('mother_name')->nullable(); // Mother name (nullable)
            $table->integer('siblings_count')->default(0); // Default to 0
            $table->integer('working_family_members')->default(0); // Default to 0
            $table->string('backhome_city'); // Example: "Sylhet", "Non-Sylheti"

            // Spouse Expectations
            $table->string('spouse_citizenship'); // Example: "British Citizen", "Non-British"
            $table->string('spouse_occupation_preference'); // Example: "Stable job", "Doesn’t matter"
            $table->string('spouse_skin_colour'); // Example: "Doesn’t matter", "Brown"
            $table->string('spouse_height'); // Example: "Doesn’t matter", "Minimum 4’-4’6’’"
            $table->string('spouse_education_preference'); // Example: "Doesn’t matter", "Graduated"
            $table->string('spouse_religious_dress_preference'); // Example: "Yes", "Modest", "No"
            $table->string('spouse_age_preference'); // Example: "18-50"
            $table->string('spouse_area_choice'); // Example: "Anywhere in the UK", "Only in Greater London"
            $table->string('spouse_council'); // Example: "Anywhere in the UK"
            $table->string('spouse_marital_status'); // Example: "Never married", "Widowed"
            $table->string('spouse_consider_divorce'); // Example: "Yes", "No"
            $table->string('spouse_consider_divorce_with_children'); // Example: "Yes", "No"
            $table->string('spouse_consider_with_disabilities'); // Example: "Yes", "No"
            $table->string('spouse_consider_non_uk_citizen'); // Example: "Yes", "No"
            $table->string('spouse_willing_to_relocate'); // Example: "Yes", "No"
            $table->string('spouse_living_arrangements'); // Example: "With family", "Willing to live alone"
            $table->string('wedding_plan'); // Example: "Small nikah", "Expensive wedding"
            $table->text('about_yourself_and_spouse_expectations')->nullable(); // Optional description of yourself and expectations
            $table->string('guardian_name')->nullable(); // Guardian name (nullable)
            $table->string('relationship_with_guardian')->nullable(); // Relationship with guardian
            $table->string('guardian_whatsapp_number')->nullable(); // WhatsApp number of guardian

            // ID Verification
            $table->boolean('id_verified')->default(false); // Whether the ID is verified
            $table->unsignedBigInteger('user_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
