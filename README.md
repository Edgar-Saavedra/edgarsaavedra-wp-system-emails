# edgarsaavedra-wp-system-emails
A wordpress plugin presenting custom system emails.

This plugin is used in conjunction with [mjml](https://mjml.io/documentation/#installation) for better emails templates.

Install mjml

```
    # Install with npm in a folder where you will use MJML
    $> npm install mjml
    
    # In the folder where you installed MJML you can now run:
    $> ./node_modules/.bin/mjml -V
    
    # To avoid typing ./node_modules/.bin/, add it to your PATH (add it to .bashrc or .zshrc so you don't have to export it anymore):
    $> export PATH="$PATH:./node_modules/.bin"
    
    # You can now run MJML directly, in that folder:
    $> mjml -V
    
    #run mjml on custom template files, example:
    $> mjml templates/emails/password-change/template.mjml -o templates/emails/password-change/template.php 
```