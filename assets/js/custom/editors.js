// HTML
var box_html = null;
if(box_html = document.getElementById('box_html')) {
  var editorHtml = CodeMirror.fromTextArea(box_html, {
    mode: "text/html",
    extraKeys: {"Ctrl-Space": "autocomplete"},
    keyMap: "sublime",
    theme: "monokai",
    lineNumbers: true,
    tabSize: 2,
    //value: 'content here',
  });
  //console.log(editorHtml.getDoc().getValue("\n"));
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
    showCursorWhenSelecting: true,
    tabSize: 2,
    //value: 'content here',
  });
  //console.log(editorCss.getDoc().getValue("\n"));
}

// JavaScript
var box_js = null;
if(box_js = document.getElementById('box_js')) {
  var editorJs = CodeMirror.fromTextArea(document.getElementById('box_js'), {
    value: '// Sublime Text mode.',
    lineNumbers: true,
    mode: "javascript",
    keyMap: "sublime",
    autoCloseBrackets: true,
    matchBrackets: true,
    showCursorWhenSelecting: true,
    theme: "monokai",
    tabSize: 2,
    //value: 'content here',
  });
  //console.log(editorJs.getDoc().getValue("\n"));
}

// other code
var box_otherCode = null;
if(box_otherCode = document.getElementById('box_otherCode')) {
  var otherCode = CodeMirror.fromTextArea(box_otherCode, {
    //mode: "text/css",
    extraKeys: {"Ctrl-Space": "autocomplete"},
    keyMap: "sublime",
    theme: "monokai",
    lineNumbers: true,
    showCursorWhenSelecting: true,
    tabSize: 2,
    //value: 'content here',
  });
  //console.log(editorCss.getDoc().getValue("\n"));
}

// PHP
var phpCode = null;
if(phpCode = document.getElementById('phpCode')) {
  var editorPHP = CodeMirror.fromTextArea(document.getElementById('phpCode'), {
    value: '// Sublime Text mode.',
    lineNumbers: true,
    mode: "application/x-httpd-php",
    keyMap: "sublime",
    autoCloseBrackets: true,
    matchBrackets: true,
    showCursorWhenSelecting: true,
    theme: "monokai",
    tabSize: 2,
    //value: 'content here',
  });
  //console.log(editorJs.getDoc().getValue("\n"));
}