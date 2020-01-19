require('./style.css');

{
  const init = () => {
    const $filterForm = document.querySelector('.filter_function');
    if ($filterForm) {
      const $priceRange = document.querySelector('#price_range');
      if ($priceRange) {
        $priceRange.addEventListener('input', editPriceText);
        $priceRange.addEventListener('change', editPriceText);
      }
    }

  };

  const editPriceText = e => {
    const $priceText = document.querySelector('.price_chosen');
    if ($priceText) {
      $priceText.textContent = e.target.value;
    }
  };




  // const $todosList = document.getElementById(`todosList`),
  //   $insertTodoForm = document.getElementById(`insertTodoForm`),
  //   $inputText = document.getElementById(`inputText`);

  // const init = () => {
  //   if ($todosList) {
  //     loadTodos();
  //   }
  //   if ($insertTodoForm) {
  //     $insertTodoForm.addEventListener(`submit`, handleSubmitInsertTodoForm);
  //   }
  // };

  // const loadTodos = () => {
  //   fetch(`index.php`, {
  //     headers: new Headers({
  //       Accept: `application/json`
  //     })
  //   })
  //     .then(r => r.json())
  //     .then(data => handleLoadTodos(data));
  // };

  // const handleLoadTodos = data => {
  //   $todosList.innerHTML = data.map(todo => createTodoListItem(todo)).join(``);
  // };

  // const createTodoListItem = todo => {
  //   return `<li>${todo.text}</li>`;
  // };

  // const handleSubmitInsertTodoForm = e => {
  //   e.preventDefault();
  //   fetch($insertTodoForm.getAttribute('action'), {
  //     headers: new Headers({
  //       Accept: `application/json`
  //     }),
  //     method: 'post',
  //     body: new FormData($insertTodoForm)
  //   })
  //     .then(r => r.json())
  //     .then(data => handleLoadSubmit(data));
  // };

  // const handleLoadSubmit = data => {
  //   const $errorText = document.querySelector(`.error--text`);
  //   $errorText.textContent = '';
  //   if (data.result === 'ok') {
  //     $inputText.value = '';
  //     loadTodos();
  //   } else {
  //     if (data.errors.text) {
  //       $errorText.textContent = data.errors.text;
  //     }
  //   }
  // };

  // init();

  init();
}
