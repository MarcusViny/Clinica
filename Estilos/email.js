$(document).ready(function() {
  $('input[type="email"]').on('input', function() {
    var input = $(this);
    if (input.val().trim().length > 0 && input.hasClass('is-invalid')) {
      input.removeClass('is-invalid');
      input.addClass('is-valid');
    } else if (input.val().trim().length === 0) {
      input.removeClass('is-valid');
      input.addClass('is-invalid');
    }
  });
});