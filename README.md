# Fansoro Contact Plugin
Simple contact plugin for Fansoro.

Use this code in Fansoro Templates to show contact form:
```smarty
{Contact::form('admin@site.org')}
```

You can ease configure and set your fields for contact form here: `/plugins/contact/contact.yml`  

#### Create new field example
File: `/plugins/contact/contact.yml`  
```yml
...
fields:
  ...
  phone:
    label: 'Phone'
    type: text
    class: 'form-control'
```

#### Create select form control example
```yml
...
fields:
  ...
  department:
    label: 'Department'
    type: select
    class: 'form-control'
    default_option: 'Choose a department'
    options:
      manufacturing: Manufacturing
      administration: Administration
      support: Support
```

#### Display new field in email template
File: `/plugins/contact/templates/email.tpl`  
```yml
Phone: {$fields.phone}
```

#### Fields & Attributes
```
fields:
  text: a simple text field
    type: sets the field title value
	id: sets the field id
	class: sets the field class
	disabled: sets the field disabled state
	placeholder: sets the field placeholder value
	readonly: sets the field readonly state  
  email: an email field, with validation
    type: sets the field title value
    id: sets the field id
    class: sets the field class
    disabled: sets the field disabled state
    placeholder: sets the field placeholder value
    readonly: sets the field readonly state
  textarea: a textarea
    type: sets field type
    id: sets the textarea id
    class: sets the textarea class
    rows: sets the textarea rows
    cols: sets the textarea cols
  select: a select field
    type: sets field type
    id: sets the select id
    class: sets the select class
```

#### Buttons & Attributes
```
buttons:
  button:
    type: sets button type
    id: sets the button id
    class: sets the button class
    value: sets the button value
    name: sets the button name
```

## License
See [LICENSE](https://github.com/fansoro/fansoro-plugin-contact/blob/master/LICENSE)
