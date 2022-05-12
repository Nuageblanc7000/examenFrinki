<?php 

namespace App\Data;
/**
 * cette classe va servir pour remplir mes filtre.
 * 
 */
final class DataFilter {
    
    private $search = null;

    private  $price;

    private  $state;
    
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

