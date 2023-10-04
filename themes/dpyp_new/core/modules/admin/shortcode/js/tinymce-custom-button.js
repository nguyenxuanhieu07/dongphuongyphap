(function() {
  tinymce.create('tinymce.plugins.suggest_link', {
    init: function(editor, url) {
      editor.addButton('suggest_link', {
        type: 'menubutton',
        text: 'TDT',
        icon: false,
        menu: 
        [
        {
          text: 'Thêm link bài gợi ý',
          onclick: function() { 
            tinyMCE.activeEditor.execCommand('suggest_link_command');
          }
        },
        {
          text: 'CTA Liên hệ',
          onclick: function() {
            editor.insertContent('[cta-contact]');
          }
        },

        ]
      });
      editor.addCommand('suggest_link_command', function() {
        editor.windowManager.open({
          title: 'Chèn link bài viết đọc thêm',
          width: 700,
          height: 400,
          inline: 1,
          id: 'insert-suggest-link-dialog',
          body: [
          {type: 'textbox', name: 'suggest_title', label: 'Tiêu đề', value: 'Có thể bạn quan tâm'},
          ],
          onsubmit: function(e) {
            var suggest_title = e.data.suggest_title;
            var content_html_output = '<div id="sticky-after-content" class="sticky-after-content">';
            content_html_output += '<p class="sticky-heading">'+ suggest_title +'</p>';
            content_html_output += ' <ul class="list-sticky-post">';
            content_html_output += '<li class="post">';
            content_html_output += '<a href="#">Tiêu đề bài viết</a>';
            content_html_output += '</li>';
            content_html_output += '</ul>';
            content_html_output += '</div>';

            editor.insertContent(content_html_output);
          }
        });
      });
    },
    createControl: function(n, cm) {
      return null;
    },
  });
  tinymce.PluginManager.add('suggest_link', tinymce.plugins.suggest_link);
})();