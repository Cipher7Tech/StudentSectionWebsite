(function ($) {
  "use strict";

  function verificationForm() {
    var current_fs, next_fs, previous_fs;
    var left, opacity, scale;
    var animating;

    $(".next").click(function () {
      if (animating) return false;
      animating = true;

      // Validate current fieldset before proceeding
      if (!validateFields($(this).closest("fieldset"))) {
        animating = false;
        return false;
      }

      current_fs = $(this).parent();
      next_fs = $(this).parent().next();

      $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

      next_fs.show();
      current_fs.animate(
        {
          opacity: 0,
        },
        {
          step: function (now, mx) {
            scale = 1 - (1 - now) * 0.2;
            left = now * 50 + "%";
            opacity = 1 - now;
            current_fs.css({
              transform: "scale(" + scale + ")",
              position: "absolute",
            });
            next_fs.css({
              left: left,
              opacity: opacity,
            });
          },
          duration: 800,
          complete: function () {
            current_fs.hide();
            animating = false;
          },
          easing: "easeInOutBack",
        }
      );
    });

    $(".previous").click(function () {
      if (animating) return false;
      animating = true;

      current_fs = $(this).parent();
      previous_fs = $(this).parent().prev();

      $("#progressbar li")
        .eq($("fieldset").index(current_fs))
        .removeClass("active");

      previous_fs.show();
      current_fs.animate(
        {
          opacity: 0,
        },
        {
          step: function (now, mx) {
            scale = 0.8 + (1 - now) * 0.2;
            left = (1 - now) * 50 + "%";
            opacity = 1 - now;
            current_fs.css({
              left: left,
            });
            previous_fs.css({
              transform: "scale(" + scale + ")",
              opacity: opacity,
            });
          },
          duration: 800,
          complete: function () {
            current_fs.hide();
            animating = false;
          },
          easing: "easeInOutBack",
        }
      );
    });

    $(".submit").click(function () {
      return false;
    });
  }

  function validateFields(fieldset) {
    var isValid = true;
    fieldset.find("input, select, textarea").each(function () {
      if ($(this).prop("required")) {
        if ($(this).attr("type") === "radio") {
          var name = $(this).attr("name");
          if (
            fieldset.find('input[name="' + name + '"]:checked').length === 0
          ) {
            isValid = false;
            fieldset.find('input[name="' + name + '"]').addClass("error");
            fieldset
              .find('input[name="' + name + '"]')
              .closest(".input-field")
              .find(".error-message")
              .show();
          } else {
            fieldset.find('input[name="' + name + '"]').removeClass("error");
            fieldset
              .find('input[name="' + name + '"]')
              .closest(".input-field")
              .find(".error-message")
              .hide();
          }
        } else if ($(this).is("select")) {
          if ($(this).val() === "0" || $(this).val() === "") {
            isValid = false;
            $(this).addClass("error");
            $(this).next(".error-message").show();
          } else {
            $(this).removeClass("error");
            $(this).next(".error-message").hide();
          }
        } else if ($(this).attr("type") === "file") {
          if (!$(this).val()) {
            isValid = false;
            $(this).addClass("error");
            $(this).next(".error-message").show();
          } else {
            $(this).removeClass("error");
            $(this).next(".error-message").hide();
          }
        } else if (!$(this).val()) {
          isValid = false;
          $(this).addClass("error");
          $(this).next(".error-message").show();
        } else {
          $(this).removeClass("error");
          $(this).next(".error-message").hide();
        }
      }
    });
    return isValid;
  }

  verificationForm();
})(jQuery);
