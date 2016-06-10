var guestCount = 0;
var rsvpForm;
var childCount = 1;
var guestDisplayValue = 1;
var guestList = [];
$(document).ready(function () {
        rsvpForm = $('#additionalGuests');

        var addGuestButton = $('#addGuestButton');
        var addButtonDiv = $('#addButtonDiv');
        var addChildButton = $('#addChildButton');

        var nextStep = $('#nextStep');

        var guessNumberInput = $('#guestNumber');
        addGuestButton.click(function () {
            guestCount++;
            guestDisplayValue++;
            guessNumberInput.val(guestCount);
            addGuestRow();

        });

        addChildButton.click(function () {
            guestCount++;
            guessNumberInput.val(guestCount);
            addChildRow();
            childCount++;
        });

        nextStep.click(function () {

        });
    }
);

function addGuestRow() {
    rsvpForm.append('<div id="guest-' + guestCount + '">\
        <div class="row">\
        <h4>Guest ' + (guestDisplayValue) + '</h4>\
    </div>\
    <div class="row">\
    <div class="col-md-3">\
        <label for="firstName">First Name</label>\
    <input type="text" class="form-control" name="firstName[' + guestCount + ']"\
    placeholder="First Name"\
    required>\
    </div>\
    <div class="col-md-3">\
        <label for="lastName">Last Name</label>\
    <input type="text" class="form-control" name="lastName[' + guestCount + ']"\
    placeholder="Last Name"\
    required>\
    </div>\
    <div class="col-md-3">\
        <label for="email">Email</label>\
        <input type="text" class="form-control" name="email[' + guestCount + ']"\
    placeholder="Email">\
    </div>\
    <div class="col-md-3">\
        <label for="phone">Cell Number</label>\
    <input type="text" class="form-control" name="phone_number[' + guestCount + ']"\
    placeholder="Cell Phone #">\
    </div>\
    </div>\
    <br>\
    <div class="row">\
        <div class="col-md-12 text-center" data-toggle="buttons">\
        <label class="btn btn-not-attending col-md-4 col-md-offset-1">\
        <input type="radio" name="attending[' + guestCount + ']" value="off" id="option2" autocomplete="off"> Not Attending :(\
    </label>\
    <div class="col-md-2"></div>\
        <label class="btn btn-attending col-md-4">\
        <input type="radio" name="attending[' + guestCount + ']" value="on" id="option3" autocomplete="off" required> Attending!\
    </label>\
    </div>\
    </div>\
    </div>\
    <hr>');
}

function addChildRow() {
    rsvpForm.append('<div id="guest-' + guestCount + '">\
        <div class="row">\
        <h4>Child ' + (childCount) + '</h4>\
    </div>\
    <div class="col-md-6">\
        <label for="firstName">First Name</label>\
    <input type="text" class="form-control" name="firstName[' + guestCount + ']"\
    placeholder="First Name"\
    required>\
    </div>\
    <div class="col-md-6">\
        <label for="lastName">Last Name</label>\
    <input type="text" class="form-control" name="lastName[' + guestCount + ']"\
    placeholder="Last Name"\
    required>\
    </div>\
        <input type="hidden" class="form-control" value="child" name="email[' + guestCount + ']"\
    placeholder="Email">\
    <input type="hidden" class="form-control" name="phone_number[' + guestCount + ']"\
    placeholder="Cell Phone #">\
        <input type="hidden" value="on" class="form-control" name="attending[' + guestCount + ']">\
    </div>');
}