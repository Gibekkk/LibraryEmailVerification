<?php

namespace Tests\Unit;

use App\Models\BookRequest;
use App\Models\Books;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Prompts\Output\ConsoleOutput;

class BookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_bookRequest()
    {
        User::factory()->create([
            'name' => 'Test Librarian',
            'username' => 'librarian',
            "level" => "librarian"
        ]);
        // Arrange
        $data = [
            'librarianID' => 1,
            'judul' => "Learn UnitTesting",
            'penerbit' => "UC Makassar",
            'penulis' => "Gibek",
            'tahun_terbit' => 2020,
            'ISBN' => "1234",
            'isEbook' => true,
            'ebookLink' => "www.google.com",
            'isBorrowed' => false,
            'requestType' => "create",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];

        // Act
        $requestBook = BookRequest::create($data);

        // Assert
        $this->assertInstanceOf(BookRequest::class, $requestBook);
        $this->assertEquals(1, $requestBook->librarianID);
        $this->assertEquals("Learn UnitTesting", $requestBook->judul);
        $this->assertEquals("UC Makassar", $requestBook->penerbit);
        $this->assertEquals("Gibek", $requestBook->penulis);
        $this->assertEquals(2020, $requestBook->tahun_terbit);
        $this->assertEquals("1234", $requestBook->ISBN);
        $this->assertEquals(true, $requestBook->isEbook);
        $this->assertEquals("www.google.com", $requestBook->ebookLink);
        $this->assertEquals(false, $requestBook->isBorrowed);
        $this->assertEquals("create", $requestBook->requestType);
    }
    public function it_can_create_a_book()
    {
        // Arrange
        $data = [
            'judul' => "Learn UnitTesting",
            'penerbit' => "UC Makassar",
            'penulis' => "Gibek",
            'tahun_terbit' => 2020,
            'ISBN' => "1234",
            'isEbook' => true,
            'ebookLink' => "www.google.com",
            'isBorrowed' => false,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];

        // Act
        $book = Books::create($data);

        // Assert
        $this->assertInstanceOf(Books::class, $book);
        $this->assertEquals("Learn UnitTesting", $book->judul);
        $this->assertEquals("UC Makassar", $book->penerbit);
        $this->assertEquals("Gibek", $book->penulis);
        $this->assertEquals(2020, $book->tahun_terbit);
        $this->assertEquals("1234", $book->isbn);
        $this->assertEquals(true, $book->isEbook);
        $this->assertEquals("www.google.com", $book->ebookLink);
        $this->assertEquals(false, $book->isBorrowed);
    }
}
