// magic code to add a tinymce dropdown for shortcodes in WP post editor
// thanks to http://www.wpexplorer.com/wordpress-tinymce-tweaks/ for the help!

(function() {
    let primaryColorLabel = "Red",
        secondaryColorLabel = "Blue",
        blackColorLabel = "Black",
        whiteColorLabel = "White";

	tinymce.PluginManager.add("crunch_mce_button", function( editor, url ) {
		editor.addButton( "crunch_mce_button", {
			text: "Shortcodes",
			icon: false,
			type: "menubutton",
			menu: [

                //Blockquote Shortcode
                // ====================================
				{
					text: "Blockquote",
					onclick: function() {
						editor.windowManager.open( {
							title: "Insert Blockquote",
							body: [
								{
									type: "textbox",
									name: "textboxQuote",
									label: "Quote",
									value: "",
									multiline: true,
									minWidth: 400,
									minHeight: 200,
								},
								{
									type: "textbox",
									name: "textboxCite",
									label: "Cite",
									value: "",
									multiline: true,
									minWidth: 400,
								},
							],
							onsubmit: function( e ) {
								editor.insertContent( '[blockquote cite="' + e.data.textboxCite + '" ]' + e.data.textboxQuote + '[/blockquote]');
							}
						});
					}
				},

				//Button Shortcode
				// ====================================
				{
					text: "Button",
					minWidth: 300,
					onclick: function() {
						editor.windowManager.open( {
							title: "Insert Button Shortcode",
							body: [

								// button text
								{
									type: "textbox",
									name: "buttonText",
									label: "Button Text",
									value: "Learn More",
									multiline: false,
									minWidth: 400
								},

								// button URL
								{
									type: "textbox",
									name: "buttonUrl",
									label: "URL",
									value: "http://",
									multiline: false,
									minWidth: 400
								},

                                // button Type
								{
									type: "listbox",
									name: "buttonType",
									label: "Type",
									"values": [
										{text: "Full Background", value: "full-background"},
										{text: "Outline", value: "outline"},
										{text: "Text Only", value: "text-only"},
										{text: "Text Only With Border Bottom", value: "text-only-with-border-bottom"}
									]
								},

                                // button Size
								{
									type: "listbox",
									name: "buttonSize",
									label: "Size",
									"values": [
										{text: "Small", value: "small"},
										{text: "Medium", value: "medium"},
										{text: "Large", value: "large"}
									]
								},

                                // button Color
								{
									type: "listbox",
									name: "buttonColor",
									label: "Color",
									"values": [
										{text: primaryColorLabel, value: "primary-color"},
										{text: blackColorLabel, value: "black-color"},
										{text: whiteColorLabel, value: "white-color"}
									]
								},

                                // button open in new tab
                                {
                                    type: "checkbox",
                                    name: "buttonOpenInNewTab",
                                    label: "Open in new tab",
                                },

							],
							onsubmit: function( e ) {
                                editor.insertContent( '[button text="' + e.data.buttonText + '" url="' + e.data.buttonUrl + '" size="' + e.data.buttonSize + '" type="' + e.data.buttonType + '" color="' + e.data.buttonColor + '" open-in-new-tab="' + e.data.buttonOpenInNewTab + '"]');
							}
						});
					}
				},

                // Panel shortcode
                // ====================================
                {
                    text: "Panel",
                    minWidth: 300,
                    onclick: function() {
                        editor.windowManager.open( {
                            title: "Insert Panel Shortcode",
                            body: [
                                // Panel Type
                                {
                                    type: "listbox",
                                    name: "listboxType",
                                    label: "Type",
                                    "values": [
                                        {text: "Full Background", value: "full-background"},
                                        {text: "Outline", value: "outline"}
                                    ]
                                },
                                {
                                    type: "listbox",
                                    name: "listboxColor",
                                    label: "Color",
                                    "values": [
                                        {text: primaryColorLabel, value: "primary"},
                                        {text: secondaryColorLabel, value: "secondary"},

                                    ]
                                },

                            ],
                            onsubmit: function( e ) {
                                editor.insertContent( '[panel type="' + e.data.listboxType + '" color="' + e.data.listboxColor + '"]Some content goes here[/panel]');
                            }
                        });
                    }
                },

                // Intro shortcode
                // ====================================
                {
                    text: "Intro",
                    onclick: function() {
                        editor.windowManager.open( {
                            title: "Insert intro Shortcode",
                            body: [
                                {
                                    type: "textbox",
                                    name: "textboxIntro",
                                    label: "Intro Text",
                                    value: "",
                                    multiline: true,
                                    minWidth: 400,
                                    minHeight: 200
                                },
                            ],
                            onsubmit: function( e ) {
                                editor.insertContent( "[intro]" + e.data.textboxIntro + "[/intro]");
                            }
                        });
                    }
                },


				// List Shortcode
				// ====================================
				{
					text: "List",
					onclick: function() {
						editor.windowManager.open( {
							title: "Insert list style",
							body: [
                                // List Type
								{
									type: "listbox",
									name: "listboxListTypes",
									label: "List Type",
									minWidth: 200,
									"values": [
										{text: "Circle", value: "circle"},
										{text: "Square", value: "square"}
									]
								},

                                // List Color
								{
									type: "listbox",
									name: "listboxListColor",
									label: "Color",
									"values": [
										{text: primaryColorLabel, value: "primary-color"},
                                        {text: blackColorLabel, value: "black-color"},
                                        {text: whiteColorLabel, value: "white-color"}
									]
								},
							],
							onsubmit: function( e ) {
								editor.insertContent( '[list type="' + e.data.listboxListTypes + '" color="' + e.data.listboxListColor + '"]<ul><li>List Item</li></ul>[/list]');
							}
						});
					}
				}

			]

		});

	});
})();
