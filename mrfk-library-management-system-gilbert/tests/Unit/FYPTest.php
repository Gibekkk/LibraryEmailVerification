<?php

namespace Tests\Unit;

use App\Models\FinalYearProjectRequest;
use App\Models\FinalYearProject;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FYPTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_fypResquest()
    {
        User::factory()->create([
            'name' => 'Test Librarian',
            'username' => 'librarian',
            "level" => "librarian"
        ]);
        // Arrange
        $data = [
            'librarianID' => 3,
            'title' => "Learn UnitTesting",
            'student_name' => "Gibek",
            'supervisor' => "Anok",
            'submission_year' => 2020,
            'abstract' => "Pendahuluan",
            'requestType' => "create",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];

        // Act
        $requestFYP = FinalYearProjectRequest::create($data);

        // Assert
        $this->assertInstanceOf(FinalYearProjectRequest::class, $requestFYP);
        $this->assertEquals(3, $requestFYP->librarianID);
        $this->assertEquals("Learn UnitTesting", $requestFYP->title);
        $this->assertEquals("Gibek", $requestFYP->student_name);
        $this->assertEquals("Anok", $requestFYP->supervisor);
        $this->assertEquals(2020, $requestFYP->submission_year);
        $this->assertEquals("Pendahuluan", $requestFYP->abstract);
        $this->assertEquals("create", $requestFYP->requestType);
    }
    public function it_can_create_a_fyp()
    {
        // Arrange
        $data = [
            'title' => "Learn UnitTesting",
            'student_name' => "Gibek",
            'supervisor' => "Anok",
            'submission_year' => 2020,
            'abstract' => "Pendahuluan",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];

        // Act
        $FYP = FinalYearProject::create($data);

        // Assert
        $this->assertInstanceOf(FinalYearProject::class, $FYP);
        $this->assertEquals("Learn UnitTesting", $FYP->title);
        $this->assertEquals("Gibek", $FYP->student_name);
        $this->assertEquals("Anok", $FYP->supervisor);
        $this->assertEquals(2020, $FYP->submission_year);
        $this->assertEquals("Pendahuluan", $FYP->abstract);
    }
}
