jQuery(function ($) {

  $.post('/', {
    action: 'update',
    dataType: "json",
  }, function (response) {
    start(response);
  });

  function start(response = undefined) {
    var max_passangers = 40;

    if (response) {
      var direction = response.split(',').pop();
      var passengers = response.split(',')[0];

      if (passengers < max_passangers) {
        setTimeout(function () {
          door();
          move(direction);
          setTimeout(function () {
            door();
          }, 1000);
        }, 60000);

      } else {
        door();
        move(direction);
        setTimeout(function () {
          door();
        }, 1000);
      }

    }
  }

  function door() {
    var close_door = '../images/busClose.png';
    var open_door = '../images/busOpen.png';
    var current_door_position = $('#bus img').attr('src');

    if (current_door_position == close_door) {
      $('#bus img').attr('src', open_door)
    }
    if (current_door_position == open_door) {
      $('#bus img').attr('src', close_door)
    }
  }

  function move(direction) {

    if (direction == 'forward') {
      $("#bus img").animate({marginLeft: "+=335px"}, 1000);
    }
    if (direction == 'back') {
      $("#bus img").animate({marginLeft: "-=335px"}, 1000);
    }

    $.post('/', {
      action: 'update',
      dataType: "json",
    }, function (response) {
      start(response);
    });
  }

});
