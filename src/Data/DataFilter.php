<?php 

namespace App\Data;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * cette classe va servir pour remplir mes filtres.
 * 
 * 
 */
final class DataFilter {

    private $page = 1;
    
    private $search;

    private  $price;

    private  $state;

    
    public function getPage(): ?int
    {   
        /**
         * je vérifie si la est différente d'un nombre(pour éviter les erreurs si on change dans l'url par du string)
         */
        if(!$this->page){
            return $this->page = 1;
        }
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

