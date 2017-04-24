(function() {
   tinymce.PluginManager.add('eightmedi_pro_mce_button', function( editor, url ) {
      editor.addButton( 'eightmedi_pro_mce_button', {
         text: 'Short Codes',
         icon: false,
         type: 'menubutton',
         menu: [
         {
            text: 'Layouts',
            menu: [
            {
               text: 'Grid',
               onclick: function() {
                  editor.windowManager.open( {
                     title: 'Insert no columns to show in a row',
                     id:'column-selector',
                     body: [
                     {
                        type: 'listbox',
                        name: 'columns',
                        label: 'No of Columns',
                        id :'no-of-columns',
                        'values': [
                        {text: '1', value: '1'},
                        {text: '2', value: '2'},
                        {text: '3', value: '3'},
                        {text: '4', value: '4'},
                        {text: '5', value: '5'},
                        {text: '6', value: '6'},
                        ]
                     },
                     {
                        type: 'listbox',
                        name: 'first_column',
                        label: 'First Column Width',
                        id:'first_column',
                        'values': [
                        {text: '1', value: '1'},
                        {text: '2', value: '2'},
                        {text: '3', value: '3'},
                        {text: '4', value: '4'},
                        {text: '5', value: '5'},
                        {text: '6', value: '6'},
                        ]
                     },
                     {
                        type: 'listbox',
                        name: 'second_column',
                        label: 'Second Column Width',
                        id:'second_column',
                        'values': [
                        {text: '1', value: '1'},
                        {text: '2', value: '2'},
                        {text: '3', value: '3'},
                        {text: '4', value: '4'},
                        {text: '5', value: '5'},
                        {text: '6', value: '6'},
                        ]
                     },
                     {
                        type: 'listbox',
                        name: 'third_column',
                        label: 'Third Column Width',
                        id:'third_column',
                        'values': [
                        {text: '1', value: '1'},
                        {text: '2', value: '2'},
                        {text: '3', value: '3'},
                        {text: '4', value: '4'},
                        {text: '5', value: '5'},
                        {text: '6', value: '6'},
                        ]
                     },
                     {
                        type: 'listbox',
                        name: 'fourth_column',
                        label: 'Fourth Column Width',
                        id:'fourth_column',
                        'values': [
                        {text: '1', value: '1'},
                        {text: '2', value: '2'},
                        {text: '3', value: '3'},
                        {text: '4', value: '4'},
                        {text: '5', value: '5'},
                        {text: '6', value: '6'},
                        ]
                     },
                     {
                        type: 'listbox',
                        name: 'fifth_column',
                        label: 'Fifth Column Width',
                        id:'fifth_column',
                        'values': [
                        {text: '1', value: '1'},
                        {text: '2', value: '2'},
                        {text: '3', value: '3'},
                        {text: '4', value: '4'},
                        {text: '5', value: '5'},
                        {text: '6', value: '6'},
                        ]
                     },
                     {
                        type: 'listbox',
                        name: 'sixth_column',
                        label: 'Sixth Column Width',
                        id:'sixth_column',
                        'values': [
                        {text: '1', value: '1'},
                        {text: '2', value: '2'},
                        {text: '3', value: '3'},
                        {text: '4', value: '4'},
                        {text: '5', value: '5'},
                        {text: '6', value: '6'},
                        ]
                     },

                     ],
                     onsubmit: function( e ) {

                        if(e.data.columns == 1){
                           editor.insertContent( 
                             '[ed_column_wrap]<br />'+ 
                             '[ed_column span="'+e.data.first_column+'"]Put your column 1 text[/ed_column]<br />'+
                             '[/ed_column_wrap]<br />'
                             );
                        }else if(e.data.columns == 2){
                           if((parseInt(e.data.first_column) + parseInt(e.data.second_column)) < 7 ){
                              editor.insertContent( 
                                 '[ed_column_wrap]<br />'+ 
                                 '[ed_column span="'+e.data.first_column+'"]Put your column 1 text[/ed_column]<br />'+
                                 '[ed_column span="'+e.data.second_column+'"]Put your column 2 text[/ed_column]<br />'+
                                 '[/ed_column_wrap]<br />'
                                 );
                           }else{
                              alert('Invalid! Sum of columns should exceed 6');
                           }
                        }else if(e.data.columns == 3){
                           if((parseInt(e.data.first_column) + parseInt(e.data.second_column) + parseInt(e.data.third_column)) < 7 ){
                              editor.insertContent( 
                                 '[ed_column_wrap]<br />'+ 
                                 '[ed_column span="'+e.data.first_column+'"]Put your column 1 text[/ed_column]<br />'+
                                 '[ed_column span="'+e.data.second_column+'"]Put your column 2 text[/ed_column]<br />'+
                                 '[ed_column span="'+e.data.third_column+'"]Put your column 3 text[/ed_column]<br />'+
                                 '[/ed_column_wrap]<br />'
                                 );
                           }else{
                              alert('Invalid! Sum of columns should exceed 6');
                           }
                        }else if(e.data.columns == 4){
                           if((parseInt(e.data.first_column) + parseInt(e.data.second_column) + parseInt(e.data.third_column) + parseInt(e.data.fourth_column)) < 7 ){
                            editor.insertContent( 
                              '[ed_column_wrap]<br />'+ 
                              '[ed_column span="'+e.data.first_column+'"]Put your column 1 text[/ed_column]<br />'+
                              '[ed_column span="'+e.data.second_column+'"]Put your column 2 text[/ed_column]<br />'+
                              '[ed_column span="'+e.data.third_column+'"]Put your column 3 text[/ed_column]<br />'+
                              '[ed_column span="'+e.data.fourth_column+'"]Put your column 4 text[/ed_column]<br />'+
                              '[/ed_column_wrap]<br />'
                              );
                         }else{
                           alert('Invalid! Sum of columns should exceed 6');
                        }
                     }else if(e.data.columns == 5){
                        if((parseInt(e.data.first_column) + parseInt(e.data.second_column) + parseInt(e.data.third_column) + parseInt(e.data.fourth_column) + parseInt(e.data.fifth_column)) < 7 ){
                           editor.insertContent( 
                              '[ed_column_wrap]<br />'+ 
                              '[ed_column span="'+e.data.first_column+'"]Put your column 1 text[/ed_column]<br />'+
                              '[ed_column span="'+e.data.second_column+'"]Put your column 2 text[/ed_column]<br />'+
                              '[ed_column span="'+e.data.third_column+'"]Put your column 3 text[/ed_column]<br />'+
                              '[ed_column span="'+e.data.fourth_column+'"]Put your column 4 text[/ed_column]<br />'+
                              '[ed_column span="'+e.data.fifth_column+'"]Put your column 5 text[/ed_column]<br />'+
                              '[/ed_column_wrap]<br />'
                              );
                        }else{
                           alert('Invalid! Sum of columns should exceed 6');
                        }
                     }else if(e.data.columns == 6){
                        if((parseInt(e.data.first_column) + parseInt(e.data.second_column) + parseInt(e.data.third_column) + parseInt(e.data.fourth_column) + parseInt(e.data.fifth_column) + parseInt(e.data.sixth_column)) < 7 ){
                           editor.insertContent( 
                              '[ed_column_wrap]<br />'+ 
                              '[ed_column span="'+e.data.first_column+'"]Put your column 1 text[/ed_column]<br />'+
                              '[ed_column span="'+e.data.second_column+'"]Put your column 2 text[/ed_column]<br />'+
                              '[ed_column span="'+e.data.third_column+'"]Put your column 3 text[/ed_column]<br />'+
                              '[ed_column span="'+e.data.fourth_column+'"]Put your column 4 text[/ed_column]<br />'+
                              '[ed_column span="'+e.data.fifth_column+'"]Put your column 5 text[/ed_column]<br />'+
                              '[ed_column span="'+e.data.sixth_column+'"]Put your column 6 text[/ed_column]<br />'+
                              '[/ed_column_wrap]<br />'
                              );
                        }else{
                           alert('Invalid! Sum of columns should exceed 6');
                        }
                     }
                  }
               });
}
},
{
   text: 'Divider',
   onclick: function() {
      editor.windowManager.open( {
         title: 'Divider Settings',
         body: [
         {
            type: 'textbox',
            name: 'border_color',
            label: 'Border Color',
            value: '#CCCCCC'
         },
         {
            type: 'listbox',
            name: 'border_style',
            label: 'Border Style',
            'values': [
            {text: 'Solid', value: 'solid'},
            {text: 'Dashed', value: 'dashed'},
            {text: 'Dotted', value: 'dotted'},
            {text: 'Double', value: 'double'}
            ]
         },
         {
            type: 'textbox',
            name: 'thickness',
            label: 'Border Thickness',
            value: '1px'
         },
         {
            type: 'textbox',
            name: 'border_width',
            label: 'Border Width',
            value: '100%'
         },
         {
            type: 'textbox',
            name: 'mar_top',
            label: 'Top Spacing',
            value: '20px'
         },
         {
            type: 'textbox',
            name: 'mar_bot',
            label: 'Bottom Spacing',
            value: '20px'
         },

         ],
         onsubmit: function( e ) {
            editor.insertContent('[ed_divider color="'+e.data.border_color+'" style="'+e.data.border_style+'" thickness="'+e.data.thickness+'" width="'+e.data.border_width+'" mar_top="'+e.data.mar_top+'" mar_bot="'+e.data.mar_bot+'"]');
         }
      });
}
},
{
   text: 'Spacing',
   onclick: function() {
      editor.windowManager.open( {
         title: 'Spacing Settings',
         body: [
         {
            type: 'textbox',
            name: 'spacing_height',
            label: 'Spacing Height',
            value: '10px'
         }
         ],
         onsubmit: function( e ) {
            editor.insertContent('[ed_spacing spacing_height="'+e.data.spacing_height+'"]');
         }
      });
   }
}
]
},
{
   text: 'Elements',
   menu: [
   {
      text: 'Testimonial',
      onclick: function() {
         editor.windowManager.open( {
            title: 'Testimonial Block',
            body: [
            {
               type: 'textbox',
               name: 'client_name',
               label: 'Client Name',
               value: ''
            },
            {
               type: 'textbox',
               name: 'client_designation',
               label: 'Client Designation',
               value: ''
            },
            {
               type: 'button', 
               name: 'image_url', 
               label: 'Image',
               text: 'Select image',
               icon: 'icon dashicons-format-gallery',
               onclick: function() {
                  UXgalleryModal();
               },
            },
            {
               type: 'listbox',
               name: 'testimonial_image_shape',
               label: 'Image Shape',
               'values': [
               {text: 'Round', value: 'round'},
               {text: 'Square', value: 'square'}
               ]
            },
            {
               type: 'textbox',
               name: 'testimonial_desc',
               label: 'Testimonial',
               value: 'Write the Clients Testimonial Here',
               multiline: true,
               minWidth: 300,
               minHeight: 150
            },

            ],
            onsubmit: function( e ) {
               editor.insertContent('[ed_testimonial image="'+ux_selected_image+'" image_shape="'+e.data.testimonial_image_shape+'" client="'+e.data.client_name+'" designation="'+e.data.client_designation+'"]<br />'+e.data.testimonial_desc+'<br />[/ed_testimonial]'); 
            }
         });
}
},
{
   text: 'Team',
   onclick: function() {
      editor.windowManager.open( {
         title: 'Testimonial Block',
         body: [
         {
            type: 'textbox',
            name: 'team_name',
            label: 'Team Member Name',
            value: ''
         },
         {
            type: 'textbox',
            name: 'team_designation',
            label: 'Team Member Designation',
            value: ''
         },
         {
            type: 'button', 
            name: 'team_image_url', 
            label: 'Image',
            text: 'Select image',
            icon: 'icon dashicons-format-gallery',
            onclick: function() {
               UXgalleryModal();
            },
         },
         {
            type: 'listbox',
            name: 'team_image_shape',
            label: 'Image Shape',
            'values': [
            {text: 'Round', value: 'round'},
            {text: 'Square', value: 'square'}
            ]
         },
         {
            type: 'textbox',
            name: 'team_detail',
            label: 'Detail',
            value: 'Write the Team Member Detail Here',
            multiline: true,
            minWidth: 300,
            minHeight: 150
         },

         ],
         onsubmit: function( e ) {
           editor.insertContent('[ed_team image="'+ux_selected_image+'" image_shape="'+e.data.team_image_shape+'" name="'+e.data.team_name+'" designation="'+e.data.team_designation+'"]<br />'+e.data.team_detail+'<br />[/ed_team]'); 
        }
     });
}
},
{
   text: 'Social Icons',
   onclick: function() {
      editor.windowManager.open( {
         title: 'Enter Social Icons',
         body: [
         {
            type: 'textbox',
            name: 'facebook',
            label: 'Facebook Url',
            value: 'http://facebook.com/',
            minWidth: 300,
         },
         {
            type: 'textbox',
            name: 'twitter',
            label: 'Twitter Url',
            value: 'http://twitter.com/'
         },
         {
            type: 'textbox',
            name: 'gplus',
            label: 'Google Plus Url',
            value: 'https://plus.google.com/'
         },
         {
            type: 'textbox',
            name: 'linkedin',
            label: 'Linkedin Url',
            value: 'http://www.linkedin.com'
         },
         {
            type: 'textbox',
            name: 'youtube',
            label: 'Youtube Url',
            value: 'http://www.youtube.com/'
         }, 
         {
            type: 'textbox',
            name: 'dribble',
            label: 'Dribble Url',
            value: 'https://dribbble.com/'
         },  

         ],
         onsubmit: function( e ) {
           editor.insertContent('[ed_social facebook="'+e.data.facebook+'" twitter="'+e.data.twitter+'" gplus="'+e.data.gplus+'" linkedin="'+e.data.linkedin+'" dribble="'+e.data.dribble+'"]'); 
        }
     });
}
},
{
   text: 'Toggle',
   onclick: function() {
      editor.windowManager.open( {
         title: 'Toggle',
         body: [
         {
            type: 'textbox',
            name: 'toggle_heading',
            label: 'Heading',
            value: 'Your Heading',
            minWidth: 400,
         },
         {
            type: 'textbox',
            name: 'toggle_detail',
            label: 'Detail',
            value: 'Write Detail Here',
            multiline: true,
            minWidth: 400,
            minHeight: 150
         },
         {
            type: 'listbox',
            name: 'open_close',
            label: 'Open/Close',
            'values': [
            {text: 'Close', value: 'close'},
            {text: 'Open', value: 'open'}
            ]
         },
         ],
         onsubmit: function( e ) {
           editor.insertContent('[ed_toggle title="'+e.data.toggle_heading+'" status="'+e.data.open_close+'"]'+e.data.toggle_detail+'[/ed_toggle]'); 
        }
     });
   }
},
{
   text: 'Call to Action',
   onclick: function() {
      editor.windowManager.open( {
         title: 'Toggle',
         body: [
         {
            type: 'textbox',
            name: 'call_to_action',
            label: 'Call to Action Text',
            value: 'Call to action text',
            multiline: true,
            minWidth: 500,
            minHeight: 150
         },
         {
            type: 'textbox',
            name: 'call_to_action_btn',
            label: 'Button Text',
            value: 'Read More',
            minWidth: 500,
         },
         {
            type: 'textbox',
            name: 'call_to_action_btn_url',
            label: 'Button Url',
            value: '#',
            minWidth: 500,
         },
         {
            type: 'listbox',
            name: 'btn_align',
            label: 'Button Align',
            'values': [
            {text: 'Center', value: 'center'},
            {text: 'Right', value: 'right'}
            ]
         },
         ],
         onsubmit: function( e ) {
           editor.insertContent('[ed_call_to_action button_text="'+e.data.call_to_action_btn+'" button_url="'+e.data.call_to_action_btn_url+'" button_align="'+e.data.btn_align+'"]'+e.data.call_to_action+'[/ed_call_to_action]'); 
        }
     });
}
},

{
   text: 'Call to Action with Video',
   onclick: function() {
      editor.windowManager.open( {
         title: 'Call to Action with Video',
         body: [
         {
            type: 'textbox',
            name: 'cta_video_title',
            label: 'Title',
            value: 'Eightstore Pro',
            minWidth: 500,
         },
         {
            type: 'textbox',
            name: 'cta_video_desc',
            label: 'Call to Action Description',
            value: 'Call to action Description',
            multiline: true,
            minWidth: 500,
            minHeight: 150
         },
         {
            type: 'textbox',
            name: 'cta_video',
            label: 'Enter the Video Ifame',
            value: '',
            minWidth: 700,
         },
         {
            type: 'textbox',
            name: 'cta_btn_text',
            label: 'Button Text',
            value: 'View More',
            minWidth: 500,
         },
         {
            type: 'textbox',
            name: 'cta_btn_url',
            label: 'Button URL',
            value: '',
            minWidth: 500,

         },
         ],
         onsubmit: function( e ) {
           editor.insertContent("[ed_cta_video video_title='"+e.data.cta_video_title+"' video='"+e.data.cta_video+"' video_desc='"+e.data.cta_btn_text+"' button_url='"+e.data.cta_btn_url+"' button_text='"+e.data.cta_btn_text+  "']"+e.data.cta_video_desc+"[/ed_cta_video]"); 
        }
     });
}
},

{
   text: 'Call to Action with Form',
   onclick: function() {
      editor.windowManager.open( {
         title: 'Call to Action with Form',
         body: [
         {
            type: 'textbox',
            name: 'cta_form_title',
            label: 'Title',
            value: 'Eightstore Pro',
            minWidth: 500,
         },
         {
            type: 'textbox',
            name: 'cta_form_desc',
            label: 'Call to Action Description',
            value: 'Call to action Description',
            multiline: true,
            minWidth: 500,
            minHeight: 150
         },
         {
            type: 'textbox',
            name: 'cta_form',
            label: 'Enter the Form Shortcode',
            value: '',
            minWidth: 700,
         },
         {
            type: 'textbox',
            name: 'cta_btn_text',
            label: 'Button Text',
            value: 'View More',
            minWidth: 500,
         },
         {
            type: 'textbox',
            name: 'cta_btn_url',
            label: 'Button URL',
            value: '',
            minWidth: 500,

         },
         ],
         onsubmit: function( e ) {
           editor.insertContent("[ed_cta_form form_title='"+e.data.cta_form_title+"' form_desc='"+e.data.cta_form_desc+"' button_url='"+e.data.cta_btn_url+"' button_text='"+e.data.cta_btn_text+  "']"+e.data.cta_form+"[/ed_cta_form]"); 
        }
     });
}
},


{
   text: 'Slider',
   onclick: function() {
      editor.windowManager.open( {
         title: 'Slider Settings',
         body: [
         {
            type: 'textbox',
            name: 'no_of_img',
            label: 'No of Image',
            value: '4',
            minWidth: 500,
         },
         {
            type: 'listbox',
            name: 'show_caption',
            label: 'Show Caption',
            'values': [
            {text: 'Yes', value: 'yes'},
            {text: 'No', value: 'no'}
            ]
         },
         {
            type: 'listbox',
            name: 'link_image',
            label: 'Link Image to Url',
            'values': [
            {text: 'Yes', value: 'yes'},
            {text: 'No', value: 'no'}
            ]
         },
         {
            type: 'listbox',
            name: 'open_link',
            label: 'Open Link',
            'values': [
            {text: 'In Same Tab', value: 'self'},
            {text: 'In Different Tab', value: 'blank'}
            ]
         },
         ],
         onsubmit: function( e ) {
            var caption, link_image, open_link, j;

            editor.insertContent('[ed_slider]');
            for(i=1; i <= e.data.no_of_img; i++){
               caption = e.data.show_caption=="yes" ? 'caption="Caption text'+i+'"' : '';
               link_image = e.data.link_image=="yes" ? 'link="http://linkto'+i+'"' : '';
               open_link = e.data.open_link=="self" ? 'target="_self"' : 'target="_blank"';

               editor.insertContent(
                  '<br />[ed_slide '+caption+' '+link_image+' '+open_link+']http://your_image_url'+i+'[/ed_slide]'
                  ); 
            }
            editor.insertContent('<br />[/ed_slider]');
         }
      });
}
},
{
   text: 'Tab',
   onclick: function() {
      editor.windowManager.open( {
         title: 'Tab Settings',
         body: [
         {
            type: 'textbox',
            name: 'no_of_tab',
            label: 'No of Tabs',
            value: '4',
            minWidth: 300,
         },
         {
            type: 'listbox',
            name: 'tab_type',
            label: 'Show Caption',
            'values': [
            {text: 'Horizontal', value: 'horizontal'},
            {text: 'Vertical', value: 'vertical'}
            ]
         },
         ],
         onsubmit: function( e ) {
            var j;

            editor.insertContent('[ed_tab_group type="'+e.data.tab_type+'"]');
            for(j=1; j <= e.data.no_of_tab; j++){
               editor.insertContent(
                  '<br />[ed_tab title="Title '+j+'"]Content '+j+'[/ed_tab]'
                  ); 
            }
            editor.insertContent('<br />[/ed_tab_group]');
         }
      });
   }
},
{
   text: 'List Style',
   onclick: function() {
      editor.windowManager.open( {
         title: 'Select List style',
         body: [
         {
            type: 'textbox',
            name: 'no_of_list',
            label: 'No of List Items',
            value: '4',
            minWidth: 300,
         },
         {
            type: 'listbox',
            name: 'list_type',
            label: 'List Icon',
            'values': [
            {text: 'Thunder Icon', value: 'ed-list1'},
            {text: 'Pin Icon', value: 'ed-list2'},
            {text: 'Tick Icon', value: 'ed-list3'},
            {text: 'Star Icon', value: 'ed-list4'},
            {text: 'Money Bag Icon', value: 'ed-list5'},
            {text: 'Square Icon', value: 'ed-list6'}
            ]
         },
         ],
         onsubmit: function( e ) {
            var k;

            editor.insertContent('[ed_list list_type="'+e.data.list_type+'"]');
            for(k=1; k <= e.data.no_of_list; k++){
               editor.insertContent(
                  '<br />[ed_li]List Item '+k+'[/ed_li]'
                  ); 
            }
            editor.insertContent('<br />[/ed_list]');
         }
      });
}
}
]
}
]
});
});

function UXgalleryModal(){
   // Uploading files
   var file_frame;

   event.preventDefault();

       // If the media frame already exists, reopen it.
       if ( file_frame ) {
         file_frame.open();
         return;
      }

       // Create the media frame.
       file_frame = wp.media.frames.file_frame = wp.media({
         title: jQuery( this ).data( 'uploader_title' ),
         button: {
           text: jQuery( this ).data( 'uploader_button_text' ),
        },
         multiple: false  // Set to true to allow multiple files to be selected
      });

       // When an image is selected, run a callback.
       file_frame.on( 'select', function() {
         // We set multiple to false so only get one image from the uploader
         attachment = file_frame.state().get('selection').first().toJSON();
         ux_selected_image = attachment.url;
         jQuery('.mce-i-icon.dashicons-format-gallery').parent().addClass('image-bg-button');
         jQuery('.mce-i-icon.dashicons-format-gallery').parent().css('background-image','url('+attachment.url+')');
         // Do something with attachment.id and/or attachment.url here
      });

       // Finally, open the modal
       file_frame.open();
    }

 })();