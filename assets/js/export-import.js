!function(o){var i={init:function(){o("input[name=asap-ei-export-button]").on("click",i._export),o("input[name=asap-ei-import-button]").on("click",i._import)},_export:function(){window.location.href=asapeiConfig.customizerURL+"?asap-ei-export="+asapeiConfig.exportNonce},_import:function(){var i=o(window),a=o("body"),t=o('<form class="asap-ei-form" method="POST" enctype="multipart/form-data"></form>'),n=o(".asap-ei-import-controls"),e=o("input[name=asap-ei-import-file]"),p=o(".asap-ei-uploading");""==e.val()?alert(asapeiImport.emptyImport):(i.off("beforeunload"),a.append(t),t.append(n),p.show(),t.submit())}};o(i.init)}(jQuery);