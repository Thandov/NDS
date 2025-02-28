import os

def create_wordpress_theme(theme_name, pages):
    # Create the theme directory
    if not os.path.exists(theme_name):
        os.makedirs(theme_name)

    # Loop through the pages and generate PHP files
    for page in pages:
        file_name = f"{theme_name}/{page}.php"

        # Boilerplate content for each file
        content = f"<?php\n/**\n * Template: {page.replace('-', ' ').title()}\n */\n\nget_header(); ?>\n\n<main>\n    <h1>{page.replace('-', ' ').title()}</h1>\n    <p>Content for {page.replace('-', ' ').title()} goes here.</p>\n</main>\n\n<?php get_footer(); ?>"

        # Write to the file
        with open(file_name, "w") as file:
            file.write(content)

# Define the theme name and pages
theme_name = "nds-academy-theme"
pages = [
    "front-page",
    "functions",
    "header",
    "footer",
    "page",
    "single",
    "archive",
    "home",
    "search",
    "404",
    "sidebar",
    "comments",
    "style",
    "index",
    "about-us",
    "courses",
    "single-course",
    "admissions",
    "blog",
    "contact-us",
    "portal",
    "events",
    "faq",
    "testimonials",
    "gallery",
    "careers",
    "privacy-policy",
    "terms-and-conditions"
]

# Generate the theme and files
create_wordpress_theme(theme_name, pages)

print(f"WordPress theme '{theme_name}' and pages generated successfully!")
