<?php

namespace Tests\Unit;

use App\Models\JournalRequest;
use App\Models\Journals;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JournalTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_journalRequest()
    {
        User::factory()->create([
            'name' => 'Test Librarian',
            'username' => 'librarian',
            "level" => "librarian"
        ]);
        // Arrange
        $data = [
            'librarianID' => 4,
            'judul' => "Learn UnitTesting",
            'penerbit' => "UC Makassar",
            'penulis' => "Gibek",
            'tahun_terbit' => 2020,
            'ISBN' => "1234",
            'requestType' => "create",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];

        // Act
        $requestJournal = JournalRequest::create($data);

        // Assert
        $this->assertInstanceOf(JournalRequest::class, $requestJournal);
        $this->assertEquals(4, $requestJournal->librarianID);
        $this->assertEquals("Learn UnitTesting", $requestJournal->judul);
        $this->assertEquals("UC Makassar", $requestJournal->penerbit);
        $this->assertEquals("Gibek", $requestJournal->penulis);
        $this->assertEquals(2020, $requestJournal->tahun_terbit);
        $this->assertEquals("1234", $requestJournal->ISBN);
        $this->assertEquals("create", $requestJournal->requestType);
    }
    public function it_can_create_a_journal()
    {
        // Arrange
        $data = [
            'judul' => "Learn UnitTesting",
            'penerbit' => "UC Makassar",
            'penulis' => "Gibek",
            'tahun_terbit' => 2020,
            'ISBN' => "1234",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];

        // Act
        $journal = Journals::create($data);

        // Assert
        $this->assertInstanceOf(Journals::class, $journal);
        $this->assertEquals("Learn UnitTesting", $journal->judul);
        $this->assertEquals("UC Makassar", $journal->penerbit);
        $this->assertEquals("Gibek", $journal->penulis);
        $this->assertEquals(2020, $journal->tahun_terbit);
        $this->assertEquals("1234", $journal->isbn);
    }
}
