require('./style.css');

{
  const $longreadAwards = document.querySelector('.longread_awards');
  const $longreadThemas = document.querySelector('.longread_themas');

  const init = () => {
    const $filterForm = document.querySelector('.filter_function');
    if ($filterForm) {
      const $priceRange = document.querySelector('#price_range');
      if ($priceRange) {
        $priceRange.addEventListener('input', editPriceText);
        $priceRange.addEventListener('change', editPriceText);
      }
    }

    if ($longreadAwards) {
      initAward();
    }

    if ($longreadThemas) {
      initThema();
    }
  };

  const initAward = () => {
    const $awardLinks = $longreadAwards.querySelectorAll('.award_link');
    $awardLinks.forEach($link => {
      $link.addEventListener('click', e => {
        e.preventDefault();
        showAward($link);
      });
    });
  };

  const showAward = $link => {
    const $awardPictures = $longreadAwards.querySelectorAll('.award_picture');
    $awardPictures.forEach($picture => {
      $picture.classList.add('award_picture_grey');
    });
    $link.querySelector('.award_picture').classList.remove('award_picture_grey');

    const $awardText = $longreadAwards.querySelector('.award_text');
    const $awardTexts = $awardText.querySelectorAll('p');
    $awardTexts.forEach($awardPar => {
      $awardPar.classList.add('award_text_hidden');
    });

    const $chosenAward = $link.querySelector('div').classList[0];
    const $chosenText = $awardText.querySelector(`.${$chosenAward}_text`);
    $chosenText.classList.remove('award_text_hidden');
  };


  const initThema = () => {
    const $themaLinks = $longreadThemas.querySelectorAll('.thema_link');
    $themaLinks.forEach($link => {
      $link.addEventListener('click', e => {
        e.preventDefault();
        showThema($link);
      });
    });
  };

  const showThema = $link => {
    const $themaPictures = $longreadThemas.querySelectorAll('.thema_link_image');
    $themaPictures.forEach($picture => {
      $picture.src = 'assets/img/thema_white.svg';
    });
    $link.querySelector('.thema_link_image').src = 'assets/img/thema_green.svg';

    const $themaLinkTexts = $longreadThemas.querySelectorAll('.thema_link_text');
    $themaLinkTexts.forEach($linkText => {
      $linkText.classList.add('thema_text_white');
      $linkText.classList.remove('thema_text_green');
    });
    $link.querySelector('.thema_link_text').classList.add('thema_text_green');
    $link.querySelector('.thema_link_text').classList.remove('thema_text_white');

    const $themaText = $longreadThemas.querySelector('.thema_text');
    const $themaTexts = $themaText.querySelectorAll('div');
    $themaTexts.forEach($themaPar => {
      $themaPar.classList.add('thema_text_hidden');
    });

    const $chosenThema = $link.querySelector('div').classList[0];
    const $chosenText = $themaText.querySelector(`.${$chosenThema}_text`);
    $chosenText.classList.remove('thema_text_hidden');
  };

  const editPriceText = e => {
    const $priceText = document.querySelector('.price_chosen');
    if ($priceText) {
      $priceText.textContent = e.target.value;
    }
  };



  init();
}
