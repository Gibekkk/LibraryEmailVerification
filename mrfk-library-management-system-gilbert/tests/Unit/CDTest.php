<?php

namespace Tests\Unit;

use App\Models\CDRequest;
use App\Models\CD;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_cdResquest()
    {
        User::factory()->create([
            'name' => 'Test Librarian',
            'username' => 'librarian',
            "level" => "librarian"
        ]);
        // Arrange
        $data = [
            'librarianID' => 2,
            'title' => "Learn UnitTesting",
            'artist' => "Gibek",
            'publisher' => "UC Makassar",
            'release_year' => 2020,
            'genre' => "Rock",
            'requestType' => "create",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];

        // Act
        $requestCD = CDRequest::create($data);

        // Assert
        $this->assertInstanceOf(CDRequest::class, $requestCD);
        $this->assertEquals(2, $requestCD->librarianID);
        $this->assertEquals("Learn UnitTesting", $requestCD->title);
        $this->assertEquals("Gibek", $requestCD->artist);
        $this->assertEquals("UC Makassar", $requestCD->publisher);
        $this->assertEquals(2020, $requestCD->release_year);
        $this->assertEquals("Rock", $requestCD->genre);
        $this->assertEquals("create", $requestCD->requestType);
    }
    public function it_can_create_a_cd()
    {
        // Arrange
        $data = [
            'title' => "Learn UnitTesting",
            'artist' => "Gibek",
            'publisher' => "UC Makassar",
            'release_year' => 2020,
            'genre' => "Rock",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];

        // Act
        $CD = CD::create($data);

        // Assert
        $this->assertInstanceOf(CD::class, $CD);
        $this->assertEquals("Learn UnitTesting", $CD->title);
        $this->assertEquals("Gibek", $CD->artist);
        $this->assertEquals("UC Makassar", $CD->publisher);
        $this->assertEquals(2020, $CD->release_year);
        $this->assertEquals("Rock", $CD->genre);
    }
}
