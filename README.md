# Morfy Contact Plugin
Simple contact plugin for Morfy.

Use this code in Morfy Templates to show contact form:
```smarty
{Contact::form('admin@site.org')}
```

You can ease configure and set your fields for contact form here: `/plugins/contact/contact.yml`  

#### Create new field
File: `/plugins/contact/contact.yml`  
```yml
...
fields:
  ...
  phone:
    label: 'Phone'
    type: text

```

#### Display new field in email template
File: `/plugins/contact/templates/email.tpl`  
```yml
Phone: {$fields.phone}
```

## License
See [LICENSE](https://github.com/morfy-cms/morfy-plugin-contact/blob/master/LICENSE)
