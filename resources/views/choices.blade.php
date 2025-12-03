<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Include base CSS (optional) -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css"
/>
<!-- Or versioned -->

<!-- Include Choices CSS -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"
/>
</head>
<body>
  {{-- lien choices.js=https://github.com/Choices-js/Choices?tab=readme-ov-file   --}}
  <h1>Bonjour</h1>
  <div style="margin-left: 10px; margin-right: 10px;">
  <select name="" id="" class="js-choices" multiple>
    <option value="2">zear</option>
    <option value="1">bous</option>
    <option value="3">mous</option>
    <option value="4">lous</option>  
  
  </select>
 </div>

  <!-- Include Choices JavaScript (latest) -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Pass reference
 // Pass single element
  const element = document.querySelector('.js-choices');
  //const choices = new Choices(element);
   const choices = new Choices(element, {
    removeItemButton: true,
    silent:false,
    items: [],
    choices: [],
    renderChoiceLimit: -1,
    maxItemCount: -1,
    closeDropdownOnSelect: 'auto',
    singleModeForMultiSelect: true,
    addItems: true,
    addItemFilter: (value) => !!value && value !== '',
    removeItems: true,
    removeItemButton: true,
    editItems: false, 
    duplicateItemsAllowed: false,
    delimiter: ',',
    paste: true,
    searchEnabled: true,
    searchChoices: true,
    searchFloor: 1,
    searchResultLimit: -1,
    searchFields: ['label', 'value'],
    position: 'auto',
    resetScrollPosition: true,
    shouldSort: true,
    shouldSortItems: false,
   });
  });
</script>
</body>
</html> 