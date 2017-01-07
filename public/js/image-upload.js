var holder = $('#holder'),
    tests = {
      filereader: typeof FileReader != 'undefined',
      dnd: 'draggable' in document.createElement('span'),
      formdata: !!window.FormData
    },
    support = {
      filereader: $('#filereader'),
      formdata: $('#formdata')
    },
    acceptedTypes = {
      'image/png': true,
      'image/jpeg': true,
      'image/gif': true
    },
    fileupload = $('#upload');
"filereader formdata".split(' ').forEach(function (api) {
  if (tests[api] === false) {
    support[api].attr('class', 'fail');
  } else {
    // FFS. I could have done el.hidden = true, but IE doesn't support
    // hidden, so I tried to create a polyfill that would extend the
    // Element.prototype, but then IE10 doesn't even give me access
    // to the Element object. Brilliant.
    support[api].attr('class', 'hidden');
  }
});
function previewfile(file) {
  if (tests.filereader === true && acceptedTypes[file.type] === true) {
    var reader = new FileReader();
    reader.onload = function (event) {
      var image = new Image();
      image.src = event.target.result;
      image.width = 250; // a fake resiz
      holder.html(image);
    };
    reader.readAsDataURL(file);
  }  else {
    holder.append('<p>Carátula subida (:</p>');
  }
}
function readfiles(files) {
    // debugger;
    var formData = tests.formdata ? new FormData() : null;

    if (files.length > 1) {
        var warning = $('.alert-warning');
        warning.html('<strong>Atención!</strong> Sólo se permite una imagen.');
        warning.css('display', '');
        warning.delay(4000).fadeOut();
    } else {
        if (tests.formdata) formData.append('image', files[0]);
        formData.append('film_id', $("#id").val());
        previewfile(files[0]);
    }

    // now post a new XHR request
    if (tests.formdata) {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', '/admin/film_image');
      xhr.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
      xhr.send(formData);
      $("#has_image").val("1");
    }
}
if (tests.dnd) {
  holder[0].ondragover = function () { this.className = 'hover'; return false; };
  holder[0].ondragend = function () { this.className = ''; return false; };
  holder[0].ondrop = function (e) {
    this.className = '';
    e.preventDefault();
    readfiles(e.dataTransfer.files);
  }
}
