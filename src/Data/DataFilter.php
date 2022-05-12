<?php 

namespace App\Data;

use phpDocumentor\Reflection\Types\Integer;

/**
 * cette classe va servir pour remplir mes filtre.
 * 
 * 
 */
final class DataFilter {
    private $page;
    
    private $search;

    private  $price;

    private  $state;


    public function getPage(): ?int
    {
        return $this->page;
    }

    public function setPage(string $page): self
    {
        $this->page = $page;

        return $this;
    }
    
    public function getSearch(): ?string
    {
        return $this->search;
    }

    public function setSearch(string $search): self
    {
        $this->search = $search;

        return $this;
    }
    
    public function getState(): ? string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }
    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }
}

