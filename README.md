# Attogram Framework User Module v0.0.3

[![Build Status](https://travis-ci.org/attogram/attogram-user.svg?branch=master)](https://travis-ci.org/attogram/attogram-user)
[![Latest Stable Version](https://poser.pugx.org/attogram/attogram-user/v/stable)](https://packagist.org/packages/attogram/attogram-user)
[![Latest Unstable Version](https://poser.pugx.org/attogram/attogram-user/v/unstable)](https://packagist.org/packages/attogram/attogram-user)
[![Total Downloads](https://poser.pugx.org/attogram/attogram-user/downloads)](https://packagist.org/packages/attogram/attogram-user)
[![License](https://poser.pugx.org/attogram/attogram-user/license)](https://github.com/attogram/attogram-user/blob/master/LICENSE.md)
[![Code Climate](https://codeclimate.com/github/attogram/attogram-user/badges/gpa.svg)](https://codeclimate.com/github/attogram/attogram-user)
[![Issue Count](https://codeclimate.com/github/attogram/attogram-user/badges/issue_count.svg)](https://codeclimate.com/github/attogram/attogram-user)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/8b2c48929d514a60b355a84f136c57c2)](https://www.codacy.com/app/attogram-project/attogram-user?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=attogram/attogram-user&amp;utm_campaign=Badge_Grade)
[`[CHANGELOG]`](https://github.com/attogram/attogram-user/blob/master/CHANGELOG.md)

This is the User Module for the [Attogram Framework](https://github.com/attogram/attogram).

# Installing the User Module
* You already installed the [Attogram Framework](https://github.com/attogram/attogram), didn't you?
* Goto the top level of your install, then run:
```
composer create-project attogram/attogram-user modules/_attogram_user
```

# User Module contents

* Public Actions:
 * `actions/login.php` - Login page
 * `actions/user.php` - User home page

* Admin Actions:
 * `admin_actions/user-admin.php` - User administration

* Includes:
 * `includes/attogram_user.php` - Attogram User object

 * Misc:
  * `tests/*` - phpunit tests
