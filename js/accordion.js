$(document).ready(function() {

  // Hide SubMenus
  $('.accordion ul.subMenu').hide();

  // Select all list's items with "toggleSubMenu" class and replace spans with links
  $('.accordion li.toggleSubMenu span').each(function() {

    // Stocks span content
    var spanText = $(this).text();

    $(this).replaceWith('<a href="">' + $(this).text() + '</a>');

  } );

  // Modify "click" event on links in all list's items with "toggleSubMenu" class
  $('.accordion li.toggleSubMenu > a').click(function() {

    // If submenu's already opened, close it
    if ($(this).next('ul.subMenu:visible').length != 0) {

      $(this).next('ul.subMenu').slideUp('normal');

    // If submenu's hidden, display it and close others
    } else {

      // $('.accordion ul.subMenu').slideUp('normal');

      $(this).next('ul.subMenu').slideDown('normal');

    }

    // Prevent browser to follow the link
    return false;

  } );

} );
