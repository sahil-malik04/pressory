$(function() {
    // Author Form
    $("#authorForm").validate({
        rules: {
            author_name: "required",
            nationality: "required",
            website: "required",
            twitter: "required",
            wiki_pedia: "required",
            // image: "required",
        },
        messages: {
            author_name: "Author name is required*",
            nationality: "Nationality is required*",
            website: "website is required*",
            twitter: "twitter is required*",
            wiki_pedia: "wiki pedia is required*",

        }
    });
    // Faq
    $("#faqForm").validate({
        rules: {
            fquestion: "required",
            fanswer: "required",
        },
        messages: {
            fquestion: "FAQ  is required*",
            fanswer: "FAQ answer is required*",
        }
    });
    // Fallacy Form
    $("#fallacyForm").validate({
        rules: {
            fallacy: "required",
            code: "required",
            description: "required",
        },
        messages: {
            fallacy: "Fallacy  is required*",
            code: "Code is required*",
            description: "Description is required*",
        }
    });
    // Ip
    $("#ipForm").validate({
        rules: {
            ip: "required",

        },
        messages: {
            ip: "Ip  is required*",

        }
    });

    // domain validation
    jQuery.validator.addMethod("domain", function(value, element) {
        return this.optional(element) || /^(https?:\/\/)?((?:[a-z0-9-]+\.)+(?:com|net|org))(?:\/|$)/i.test(value);
    }, "Please specify the correct url/email");



    // Publication Form
    $("#publicationForm").validate({
        rules: {
            publication: "required",
            domain: {
                required: true,
                domain: true
            },
            country: "required",
            // image: "required",
            website: "required",
            twitter: "required",
            wiki_pedia: "required",

        },
        messages: {
            publication: "Publication  is required*",
            domain: {
                required: "Domain  is required*",
                domain: "Please enter a valid domain"
            },
            country: "Country  is required*",
            // image: "Image  is required*",
            website: "website is required*",
            twitter: "twitter is required*",
            wiki_pedia: "wiki pedia is required*",

        }
    });
    // Rss Feed Form
    $("#rssfeedForm").validate({
        rules: {
            feed_address: "required",
            publication_id: "required",
            description: "required",

        },
        messages: {
            feed_address: "Feed Address  is required*",
            publication_id: "Publication  is required*",
            description: "Description  is required*",

        }
    });
    // Login Form
    $("#loginForm").validate({
        rules: {
            email: "required",
            password: "required",

        },
        messages: {
            email: "Email  is required*",
            password: "Password  is required*",

        }
    });
    // Confirm Password
    $("#change-Form").validate({
        rules: {
            current_password: "required",
            new_password: "required",
            confirm_password: {

                equalTo: "#new_password",
            }

        },
        messages: {
            current_password: "Old password is required",
            new_password: "New  password  is required*",
            confirm_password: "Enter Confirm Password Same as Password",

        },
        errorPlacement: function(error, element) {
            if (element.is(":password")) {
                error.insertAfter(element.closest('div'));

            } else {
                error.insertAfter(element);
            }
        }
    });


    // Gallery
    $("#galleryForm").validate({
        rules: {
            img_name: "required",
            "img[]": {
                required: true,
            }
        },
        messages: {
            img_name: "Title  is required*",
            'img[]': {
                reuired: "Atleast one Image  is required*"
            },


        }
    });
    // CMS Page
    $("#pageForm").validate({
        rules: {
            title: 'required',
            meta_content: 'required',
            meta_description: 'required',
            meta_keyword: 'required',
            page_body: 'required',

        },
        messages: {
            title: "Title  is required*",
            meta_content: "Meta content  is required*",
            meta_description: "Meta description is required*",
            meta_keyword: "Meta keyword is required*",
            page_body: "Page Content is required*",


        }
    });

    $("#profile").validate({
        rules: {
            first_name: 'required',
            last_name: 'required',
            email: 'required',

        },
        messages: {
            first_name: "Please enter first name",
            last_name: "Please enter last name",
            email: "Please enter email",

        }

    })



});