var $collectionHolder;

// setup an "add a tag" link
var $addIngredientLink = $('<a href="#" class="add_ingredient_link">Ajouter un ingrédient</a>');
var $newLinkLi = $('<li></li>').append($addIngredientLink);

$(document).ready(function() {
    // Get the ul that holds the collection of tags
    $collectionHolder = $('ul.ingredients');

    // add a delete link to all of the existing tag form li elements
    $collectionHolder.find('li').each(function() {
        addIngredientFormDeleteLink($(this));
    });

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addIngredientLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addIngredientForm($collectionHolder, $newLinkLi);
    });
});

function addIngredientForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append(newForm);
    addIngredientFormDeleteLink($newFormLi);
    $newLinkLi.before($newFormLi);
}

function addIngredientFormDeleteLink($ingredientFormLi) {
    var $removeFormA = $('<a href="#">Supprimer cet ingrédient</a>');
    $ingredientFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // remove the li for the tag form
        $ingredientFormLi.remove();
    });
}