# Themestar Login Customization for Magento 2

**Customize your Magento 2 Admin Login page with ease!**  
This module allows store admins to personalize the admin login screen with custom logos, background images, copyright messages, and CSS.

---

## 🧩 Features

- Enable/Disable the module easily via admin panel  
- Upload a **custom logo** for the admin login page  
- Set a **background image** to brand the login screen  
- Add **custom copyright text** using a WYSIWYG editor  
- Inject **custom CSS** to fine-tune the design to match your brand

---

## 🔧 Installation

### Manual Installation

1. Clone or download this repository into `app/code/Themestar/LoginCustom`
2. Run the following Magento CLI commands:

```bash
php bin/magento module:enable Themestar_LoginCustom
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
php bin/magento cache:flush
```

---

## ⚙️ Configuration

Navigate to:  
`Stores > Configuration > Themestar > Login Customization`

There you can:

- Enable/disable the module
- Upload your own logo
- Upload a background image
- Customize the copyright
- Add your own CSS styling

---

## 📌 Compatibility

- Magento 2.3.x - 2.4.x  
- Supports multi-store environments

---

## 🧑‍💻 Support

For support, issues, or feature requests, please open an [issue](https://magentoarabic.com/support/).
