// other code
var box_otherCode = null;
if(box_otherCode = document.querySelectorAll('.box_otherCode')) {
  box_otherCode.forEach(function(valor, indice, array) {
    var valor = CodeMirror.fromTextArea(valor, {
      mode: "scheme",
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
  });
}

// HTML
var box_html = null;
if(box_html = document.getElementById('box_html')) {
  var editorHtml = CodeMirror.fromTextArea(box_html, {
    mode: "text/html",
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
}

// css
var box_css = null;
if(box_css = document.getElementById('box_css')) {
  var editorCss = CodeMirror.fromTextArea(box_css, {
    mode: "text/css",
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
}

// JavaScript
var box_js = null;
if(box_js = document.getElementById('box_js')) {
  var editorJs = CodeMirror.fromTextArea(box_js, {
    lineNumbers: true,
    mode: "javascript",
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
}

// PHP
var phpCode = null;
if(phpCode = document.getElementById('php')) {
  var editorPHP = CodeMirror.fromTextArea(phpCode, {
    lineNumbers: true,
    mode: "application/x-httpd-php",
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
}

// SQL
var sql = null;
if(sql = document.getElementById('mysql')) {
  var editorSQL = CodeMirror.fromTextArea(sql, {
    mode: "text/x-mariadb",
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
}

// reactjs
var reactjs = null;
if(reactjs = document.getElementById('reactjs')) {
  var editorJs = CodeMirror.fromTextArea(document.getElementById('reactjs'), {
    lineNumbers: true,
    mode: "jsx",
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
}

// terminal
var terminal = null;
if(terminal = document.getElementById('terminal')) {
  var editorTerminal = CodeMirror.fromTextArea(document.getElementById('terminal'), {
    lineNumbers: true,
    mode: "shell",
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
}

$('.CodeMirror').each(function(i, el){
    el.CodeMirror.refresh();
});