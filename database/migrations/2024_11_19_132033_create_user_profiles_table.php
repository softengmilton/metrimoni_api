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
            $table->string('name')->nullable();
            $table->string('age')->nullable(); // Example: "18-20", "21-30"
            $table->string('height')->nullable(); // Example: "4'0''-4'6''", "5'4''-6'0''"
            $table->string('skin_colour')->nullable(); // Example: "Brown", "Fair"
            $table->string('figure')->nullable(); // Example: "Slim", "Healthy"
            $table->string('citizenship')->nullable(); // Example: "British Citizen", "Non-British"
            $table->string('education')->nullable(); // Example: "Secondary School", "Undergraduate Degree"
            $table->string('profession')->nullable(); // Example: "Accountant", "Doctor"
            $table->string('salary')->nullable(); // Example: "£5,000 - £10,000", "£50,001 - £100,000"
            $table->string('region')->nullable(); // Example: "Greater London", "West Midlands"
            $table->string('council')->nullable(); // Example: "Hounslow", can be null
            $table->string('houseType')->nullable(); // Example: "Own property", "Council property"
            $table->string('marital_status')->nullable(); // Example: "Never married", "Widowed"
            $table->string('gender')->nullable(); // Example: "Male", "Female"
            $table->string('religious_mazhab')->nullable(); // Example: "Hanafi", "Shafi"
            $table->string('religious_practice')->nullable(); // Example: "Very religious", "Not practising"
            $table->string('prayers')->nullable(); // Example: "Weekly minimum of 35 salah"
            $table->string('last_fajr_prayer')->nullable(); // Example: "Every day", "1 month ago"
            $table->string('can_recite_quran')->nullable(); // Example: "Yes", "No"
            $table->string('last_read_quran')->nullable(); // Example: "Every day", "1 year ago"
            $table->string('driving_license')->nullable(); // Example: "Yes", "No"
            $table->string('owns_car')->nullable(); // Example: "Yes", "No"
            $table->string('disability')->nullable(); // Example: "Yes", "No"
            $table->string('umrah_hajj')->nullable(); // Example: "Completed", "Not Yet"
            $table->string('language')->nullable(); // Example: "English & Sylheti", "Only English"
            $table->string('marriage_intentions')->nullable(); // Example: "Ready for marriage", "Within 6 months"
            $table->string('wear_religious_dress')->nullable(); // Example: "Yes", "Modest", "No"
            $table->string('smoking')->nullable(); // Example: "Smoker", "Non-smoker"
            $table->string('cooking_skills')->nullable(); // Example: "Yes, I am a professional chef", "I don’t know cooking at all"

            // Family Details
            $table->string('parents_status')->nullable(); // Example: "Both Alive", "Separated"
            $table->string('father_name')->nullable(); // Father name (nullable)
            $table->string('mother_name')->nullable(); // Mother name (nullable)
            $table->integer('siblings')->default(0); // Default to 0
            $table->integer('working_members')->default(0); // Default to 0
            $table->string('backhome_city')->nullable(); // Example: "Sylhet", "Non-Sylheti"

            // Spouse Expectations
            $table->string('citizen')->nullable()->comment('Spouse citizenship preference');
            $table->string('occupation')->nullable()->comment('Spouse occupation preference');
            $table->string('skinColour')->nullable()->comment('Spouse skin color preference');
            $table->string('heightPreference')->nullable()->comment('Spouse height preference');
            $table->string('educationPreference')->nullable()->comment('Spouse education preference');
            $table->string('religiousDress')->nullable()->comment('Religious dress preference');
            $table->string('agePreference')->nullable()->comment('Spouse age preference');
            $table->string('areaOfChoice')->nullable()->comment('Preferred area of residence');
            $table->string('preferCouncil')->nullable()->comment('Preferred council');
            $table->string('spouse_marital_status')->nullable()->comment('Preferred marital status');
            $table->string('considerDivorce')->nullable()->comment('Consider divorced spouse');
            $table->string('considerDivorceWithChildren')->nullable()->comment('Consider divorced spouse with children');
            $table->string('considerWithDisabilities')->nullable()->comment('Consider spouse with disabilities');
            $table->string('considerNonUkCitizen')->nullable()->comment('Consider non-UK citizen spouse');
            $table->string('willingToRelocate')->nullable()->comment('Is spouse willing to relocate');
            $table->string('livingArrangements')->nullable()->comment('Preferred living arrangements');
            $table->string('weddingPlan')->nullable()->comment('Preferred wedding plan');
            $table->text('aboutYourself')->nullable()->comment('About self and spouse expectations');
            $table->string('guardianName')->nullable()->comment('Guardian name');
            $table->string('guardianRelationship')->nullable()->comment('Relationship with guardian');
            $table->string('guardianWhatsApp')->nullable()->comment('Guardian\'s WhatsApp number');

            $table->boolean('agreement')->default(false);
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
