<?php

namespace Tests\Unit;

use App\Models\NewspaperRequest;
use App\Models\Newspaper;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewspaperTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_newspaperRequest()
    {
        User::factory()->create([
            'name' => 'Test Librarian',
            'username' => 'librarian',
            "level" => "librarian"
        ]);
        // Arrange
        $data = [
            'librarianID' => 5,
            'name' => "Learn UnitTesting",
            'publication_date' => \Carbon\Carbon::now(),
            'publisher' => "Kompas",
            'language' => "Brain Rot",
            'requestType' => "create",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];

        // Act
        $requestNewspaper = NewspaperRequest::create($data);

        // Assert
        $this->assertInstanceOf(NewspaperRequest::class, $requestNewspaper);
        $this->assertEquals(5, $requestNewspaper->librarianID);
        $this->assertEquals("Learn UnitTesting", $requestNewspaper->name);
        $this->assertEquals("Kompas", $requestNewspaper->publisher);
        $this->assertEquals("Brain Rot", $requestNewspaper->language);
        $this->assertEquals("create", $requestNewspaper->requestType);
    }
    public function it_can_create_a_fyp()
    {
        // Arrange
        $data = [
            'name' => "Learn UnitTesting",
            'publication_date' => \Carbon\Carbon::now(),
            'publisher' => "Kompas",
            'language' => "Brain Rot",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];

        // Act
        $newspaper = Newspaper::create($data);

        // Assert
        $this->assertInstanceOf(Newspaper::class, $newspaper);
        $this->assertEquals("Learn UnitTesting", $newspaper->name);
        $this->assertEquals("Kompas", $newspaper->publisher);
        $this->assertEquals("Brain Rot", $newspaper->language);
    }
}
