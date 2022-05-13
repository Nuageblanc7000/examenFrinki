<?php

namespace App\fixtures\Provider;

use Faker\Provider\Base;

/**
 * on extend de base qui fait partie de faker pour permettre de rajouter des provider au faker
 */
class _RandomsProvider extends Base
{
    /**
     * Undocumented function
     *
     * @return string
     */
  public function randomTitle() : string
  {
      $randTab = ['robe','veste','chaussure','blousson','t-shirt'];
     $randWord = ['je vend','super'];
      $rand = array_rand($randTab,1);
      $rand2 = array_rand($randWord,1);

      return "$randWord[$rand2]  $randTab[$rand]";
  }

  public function randDomCat() : string
  {
      $randTab = ['femme','homme','enfant'];

    return $randTab[array_rand($randTab,1)];
  }
}
