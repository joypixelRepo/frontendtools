// active if editors are editable or not
var readOnly = false;
if($('#exec-page').length > 0) {
  readOnly = true;
}

// other code
var box_otherCodes = null;
if(box_otherCodes = document.querySelectorAll('.box_otherCode')) {
  box_otherCodes.forEach(function(valor, indice, array) {
    var editor = CodeMirror.fromTextArea(valor, {
      mode: "scheme",
      readOnly: readOnly,
      keyMap: "sublime",
      theme: "monokai",
      lineNumbers: true,
      autoCloseBrackets: true,
      extraKeys: {
        "Ctrl-Enter": function(cm) {
          cm.setOption("fullScreen", !cm.getOption("fullScreen"));
        },
        "Esc": function(cm) {
          if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
        }
      }
    });
    var prev = valor.previousElementSibling;
    activeControls(prev.querySelector('*[data-action="maximize"]'), editor);
  });
}

// HTML
var box_html = null;
if(box_html = document.getElementById('box_html')) {
  var editor = CodeMirror.fromTextArea(box_html, {
    mode: "text/html",
    readOnly: readOnly,
    extraKeys: {"Ctrl-Space": "autocomplete"},
    keyMap: "sublime",
    theme: "monokai",
    lineNumbers: true,
    autoCloseBrackets: true,
    tabSize: 2,
    extraKeys: {
      "Ctrl-Enter": function(cm) {
        cm.setOption("fullScreen", !cm.getOption("fullScreen"));
      },
      "Esc": function(cm) {
        if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
      }
    }
  });
  var prev = box_html.previousElementSibling;
  activeControls(prev.querySelector('*[data-action="maximize"]'), editor);
}

// css
var box_css = null;
if(box_css = document.getElementById('box_css')) {
  var editor = CodeMirror.fromTextArea(box_css, {
    mode: "text/css",
    readOnly: readOnly,
    extraKeys: {"Ctrl-Space": "autocomplete"},
    keyMap: "sublime",
    theme: "monokai",
    lineNumbers: true,
    autoCloseBrackets: true,
    showCursorWhenSelecting: true,
    tabSize: 2,
    extraKeys: {
      "Ctrl-Enter": function(cm) {
        cm.setOption("fullScreen", !cm.getOption("fullScreen"));
      },
      "Esc": function(cm) {
        if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
      }
    }
  });
  var prev = box_css.previousElementSibling;
  activeControls(prev.querySelector('*[data-action="maximize"]'), editor);
}

// JavaScript
var box_js = null;
if(box_js = document.getElementById('box_js')) {
  var editor = CodeMirror.fromTextArea(box_js, {
    lineNumbers: true,
    mode: "javascript",
    readOnly: readOnly,
    keyMap: "sublime",
    autoCloseBrackets: true,
    matchBrackets: true,
    showCursorWhenSelecting: true,
    theme: "monokai",
    tabSize: 2,
    extraKeys: {
      "Ctrl-Enter": function(cm) {
        cm.setOption("fullScreen", !cm.getOption("fullScreen"));
      },
      "Esc": function(cm) {
        if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
      }
    }
  });
  var prev = box_js.previousElementSibling;
  activeControls(prev.querySelector('*[data-action="maximize"]'), editor);
}

// PHP
var phpCode = null;
if(phpCode = document.getElementById('php')) {
  var editor = CodeMirror.fromTextArea(phpCode, {
    lineNumbers: true,
    mode: "application/x-httpd-php",
    readOnly: readOnly,
    keyMap: "sublime",
    autoCloseBrackets: true,
    matchBrackets: true,
    showCursorWhenSelecting: true,
    theme: "monokai",
    tabSize: 2,
    extraKeys: {
      "Ctrl-Enter": function(cm) {
        cm.setOption("fullScreen", !cm.getOption("fullScreen"));
      },
      "Esc": function(cm) {
        if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
      }
    }
  });
  var prev = phpCode.previousElementSibling;
  activeControls(prev.querySelector('*[data-action="maximize"]'), editor);
}

// PHP
var laravelCode = null;
if(laravelCode = document.getElementById('laravel')) {
  var editor = CodeMirror.fromTextArea(laravelCode, {
    lineNumbers: true,
    mode: "application/x-httpd-php",
    readOnly: readOnly,
    keyMap: "sublime",
    autoCloseBrackets: true,
    matchBrackets: true,
    showCursorWhenSelecting: true,
    theme: "monokai",
    tabSize: 2,
    extraKeys: {
      "Ctrl-Enter": function(cm) {
        cm.setOption("fullScreen", !cm.getOption("fullScreen"));
      },
      "Esc": function(cm) {
        if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
      }
    }
  });
  var prev = laravelCode.previousElementSibling;
  activeControls(prev.querySelector('*[data-action="maximize"]'), editor);
}

// SQL
var sql = null;
if(sql = document.getElementById('mysql')) {
  var editor = CodeMirror.fromTextArea(sql, {
    mode: "text/x-mariadb",
    readOnly: readOnly,
    keyMap: "sublime",
    theme: "monokai",
    indentWithTabs: true,
    smartIndent: true,
    lineNumbers: true,
    matchBrackets : true,
    extraKeys: {"Ctrl-Space": "autocomplete"},
    hintOptions: {tables: {
      users: ["name", "score", "birthDate"],
      countries: ["name", "population", "size"]
    }},
    extraKeys: {
      "Ctrl-Enter": function(cm) {
        cm.setOption("fullScreen", !cm.getOption("fullScreen"));
      },
      "Esc": function(cm) {
        if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
      }
    }
  });
  var prev = sql.previousElementSibling;
  activeControls(prev.querySelector('*[data-action="maximize"]'), editor);
}

// reactjs
var reactjs = null;
if(reactjs = document.getElementById('reactjs')) {
  var editor = CodeMirror.fromTextArea(document.getElementById('reactjs'), {
    lineNumbers: true,
    mode: "jsx",
    readOnly: readOnly,
    keyMap: "sublime",
    autoCloseBrackets: true,
    matchBrackets: true,
    showCursorWhenSelecting: true,
    theme: "monokai",
    tabSize: 2,
    extraKeys: {
      "Ctrl-Enter": function(cm) {
        cm.setOption("fullScreen", !cm.getOption("fullScreen"));
      },
      "Esc": function(cm) {
        if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
      }
    }
  });
  var prev = reactjs.previousElementSibling;
  activeControls(prev.querySelector('*[data-action="maximize"]'), editor);
}

// terminal
var terminal = null;
if(terminal = document.getElementById('terminal')) {
  var editor = CodeMirror.fromTextArea(document.getElementById('terminal'), {
    lineNumbers: true,
    mode: "shell",
    readOnly: readOnly,
    keyMap: "sublime",
    autoCloseBrackets: true,
    matchBrackets: true,
    showCursorWhenSelecting: true,
    theme: "monokai",
    tabSize: 2,
    extraKeys: {
      "Ctrl-Enter": function(cm) {
        cm.setOption("fullScreen", !cm.getOption("fullScreen"));
      },
      "Esc": function(cm) {
        if (cm.getOption("fullScreen")) cm.setOption("fullScreen", false);
      }
    }
  });
  var prev = terminal.previousElementSibling;
  activeControls(prev.querySelector('*[data-action="maximize"]'), editor);
}

// solve ckeditor toolbar popup on click on other textarea (mobile)
if($('#ckeditor').length) {
  CKEDITOR.disableAutoInline = true;
}

// solve codemirror elements if ckeditor is visible
$(document).ready(checkContainer);
function checkContainer() {
  if($('#cke_ckeditor').is(':visible')) {
    $('.CodeMirror').each(function(i, el) {
      el.CodeMirror.refresh();
    });
  } else {
    setTimeout(checkContainer, 50);
  }
}

function activeControls(maximizeButton, codemirrorEditor) {
  if(maximizeButton) {
    maximizeButton.addEventListener('click', function(e) {
      e.preventDefault();
      codemirrorEditor.focus();
      codemirrorEditor.setOption("fullScreen", !codemirrorEditor.getOption("fullScreen"));
      // show exit message (common.js)
      customMessage(LANG_JS['exit_full_screen']);
    });
  }
}
