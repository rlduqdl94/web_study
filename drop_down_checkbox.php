<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <style media="screen">
    .dropdown {
    position: relative;
    font-size: 14px;
    color: #333;
}
.dropdown .dropdown-label {
    display: block;
    height: 30px;
    background: #fff;
    border: 1px solid #ccc;
    padding: 6px 12px;
    line-height: 1;
    cursor: pointer;
}
.dropdown .dropdown-label:before {
    content: "▼";
    float: right;
}
.dropdown.on .dropdown-label:before {
    content: "▲";
}
.dropdown .dropdown-list {
    padding: 12px;
    background: #fff;
    position: absolute;
    top: 30px;
    left: 2px;
    right: 2px;
    box-shadow: 0 1px 2px 1px rgb(0 0 0 / 15%);
    transform-origin: 50% 0;
    transform: scale(1, 0);
    transition: transform 0.15s ease-in-out 0.15s;
    max-height: 66vh;
    overflow-y: scroll;
}
.dropdown.on .dropdown-list {
    transform: scale(1, 1);
    transition-delay: 0s;
}
.dropdown.on .dropdown-list .dropdown-option {
    opacity: 1;
    transition-delay: 0.2s;
}
.dropdown .dropdown-option {
    display: block;
    padding: 8px 12px;
    opacity: 0;
    transition: opacity 0.15s ease-in-out;
}
a {
    text-decoration: none;
    color: #379937;
}
a {
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
* {
    box-sizing: border-box;
}
user agent stylesheet
a:-webkit-any-link {
    color: -webkit-link;
    cursor: pointer;
    text-decoration: underline;
}
    </style>
  </head>
  <body>
    <h1>Dropdown Checkboxes</h1>

    <div class="dropdown" data-control="checkbox-dropdown">
      <label class="dropdown-label">Select</label>

      <div class="dropdown-list">
        <a href="#" data-toggle="check-all" class="dropdown-option">
          Check All
        </a>

        <label class="dropdown-option">
          <input type="checkbox" name="dropdown-group" value="Selection 1" />
          Selection One
        </label>

        <label class="dropdown-option">
          <input type="checkbox" name="dropdown-group" value="Selection 2" />
          Selection Two
        </label>

        <label class="dropdown-option">
          <input type="checkbox" name="dropdown-group" value="Selection 3" />
          Selection Three
        </label>

        <label class="dropdown-option">
          <input type="checkbox" name="dropdown-group" value="Selection 4" />
          Selection Four
        </label>

        <label class="dropdown-option">
          <input type="checkbox" name="dropdown-group" value="Selection 5" />
          Selection Five
        </label>
      </div>
    </div>


<script src="./jquery/jquery.min.js"></script>

<script type="text/javascript">
(function($) {
var CheckboxDropdown = function(el) {
  var _this = this;
  this.isOpen = false;
  this.areAllChecked = false;
  this.$el = $(el);
  this.$label = this.$el.find('.dropdown-label');
  this.$checkAll = this.$el.find('[data-toggle="check-all"]').first();
  this.$inputs = this.$el.find('[type="checkbox"]');

  this.onCheckBox();

  this.$label.on('click', function(e) {
    e.preventDefault();
    _this.toggleOpen();
  });

  this.$checkAll.on('click', function(e) {
    e.preventDefault();
    _this.onCheckAll();
  });

  this.$inputs.on('change', function(e) {
    _this.onCheckBox();
  });
};

CheckboxDropdown.prototype.onCheckBox = function() {
  this.updateStatus();
};

CheckboxDropdown.prototype.updateStatus = function() {
  var checked = this.$el.find(':checked');

  this.areAllChecked = false;
  this.$checkAll.html('Check All');

  if(checked.length <= 0) {
    this.$label.html('Select Options');
  }
  else if(checked.length === 1) {
    this.$label.html(checked.parent('label').text());
  }
  else if(checked.length === this.$inputs.length) {
    this.$label.html('All Selected');
    this.areAllChecked = true;
    this.$checkAll.html('Uncheck All');
  }
  else {
    this.$label.html(checked.length + ' Selected');
  }
};

CheckboxDropdown.prototype.onCheckAll = function(checkAll) {
  if(!this.areAllChecked || checkAll) {
    this.areAllChecked = true;
    this.$checkAll.html('Uncheck All');
    this.$inputs.prop('checked', true);
  }
  else {
    this.areAllChecked = false;
    this.$checkAll.html('Check All');
    this.$inputs.prop('checked', false);
  }

  this.updateStatus();
};

CheckboxDropdown.prototype.toggleOpen = function(forceOpen) {
  var _this = this;

  if(!this.isOpen || forceOpen) {
     this.isOpen = true;
     this.$el.addClass('on');
    $(document).on('click', function(e) {
      if(!$(e.target).closest('[data-control]').length) {
       _this.toggleOpen();
      }
    });
  }
  else {
    this.isOpen = false;
    this.$el.removeClass('on');
    $(document).off('click');
  }
};

var checkboxesDropdowns = document.querySelectorAll('[data-control="checkbox-dropdown"]');
for(var i = 0, length = checkboxesDropdowns.length; i < length; i++) {
  new CheckboxDropdown(checkboxesDropdowns[i]);
}
})(jQuery);
</script>
  </body>
</html>
