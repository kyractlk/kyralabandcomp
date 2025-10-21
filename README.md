# 🧬 KayraLabWeb - Laboratory Website & Management Platform

[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-blue)](https://www.php.net/)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.0-38B2AC)](https://tailwindcss.com/)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![Status](https://img.shields.io/badge/Status-Production%20Ready-success)](https://github.com)

**[English](#english) | [Türkçe](#türkçe)**

---

<a name="english"></a>
## 📖 English Documentation

### 🎯 Overview

**KayraLabWeb** is a comprehensive, full-featured website and management platform designed for research laboratories, academic institutions, and scientific organizations. Built with simplicity and efficiency in mind, it provides a powerful admin panel, team member portal, and public-facing website - all in a single, elegant solution.

### ✨ Key Features

#### 🌐 Public Website (`index.php`)
- **Responsive Design**: Fully mobile-optimized with Tailwind CSS
- **Dynamic Sections**: Hero, Team, About, Projects, Gallery, Contact
- **Smooth Animations**: Scroll-triggered animations and smooth transitions
- **Horizontal Scrolling**: Mouse wheel-enabled horizontal navigation for projects, team, and gallery
- **Project Showcase**: Detailed project cards with modal views
- **Multi-Article Support**: Multiple research articles per project
- **Team Profiles**: Professional team member cards with LinkedIn integration
- **Gallery System**: Organized image gallery with categories
- **Theme Customization**: Dynamic RGB color themes managed from admin panel

#### 🔐 Admin Panel (`admin.php`)
- **Complete Content Management**: Manage all website content from one place
- **Project Management**: Create, edit, delete projects with team assignments
- **Team Management**: 
  - Add/edit team members with portal access
  - Password management (both hashed and plain text visible)
  - View assigned projects per member
  - Activity tracking and statistics
- **Gallery Management**: Upload and organize images with categories
- **Settings Control**:
  - Site-wide theme colors (RGB customization)
  - Toggle page visibility
  - SEO management (protected by additional password)
  - Contact information
- **Article Management**: Upload multiple research papers per project
- **Admin Users**: Role-based access control with granular permissions
- **Activity Logs**: 
  - Comprehensive logging of all actions
  - Filter by user type, date, action
  - Non-deletable audit trail
  - Real-time statistics

#### 👥 Team Member Portal (`team.php`)
- **Personal Dashboard**: Secure login for team members
- **Project Management**: 
  - View assigned projects
  - Edit project status, description, dates
  - Upload research articles
- **Profile Management**: Update bio, LinkedIn, profile image
- **Password Change**: Secure password update with verification
- **Activity Tracking**: All actions logged automatically
- **Theme Integration**: Inherits admin-defined color scheme

### 🛠️ Technical Stack

- **Backend**: PHP 7.4+ (Pure PHP, no frameworks)
- **Frontend**: HTML5, Tailwind CSS 3.0, Vanilla JavaScript
- **Data Storage**: JSON files (no database required)
- **Authentication**: Secure password hashing with bcrypt
- **File Management**: Organized upload system for images and PDFs
- **Icons**: Font Awesome 6.0

### 📁 Project Structure

```
SAYGIDEGERLAB/
├── index.php                 # Public website
├── admin.php                 # Admin panel
├── team.php                  # Team member portal
│
├── includes/
│   ├── functions.php         # Core functions (auth, file handling, etc.)
│   ├── api.php               # Admin API endpoints
│   └── team_api.php          # Team member API endpoints
│
├── data/
│   ├── config.json           # Site settings & theme colors
│   ├── projects.json         # Projects with articles
│   ├── team.json             # Team members with credentials
│   ├── gallery.json          # Gallery images
│   ├── about.json            # About page content
│   ├── footer.json           # Footer content
│   ├── admins.json           # Admin users & permissions
│   ├── seo.json              # SEO metadata
│   └── activity_log.json     # Activity logs
│
└── uploads/
    ├── projects/             # Project images
    ├── team/                 # Team member photos
    ├── gallery/              # Gallery images
    ├── articles/             # Research article PDFs
    └── general/              # Miscellaneous uploads
```

### 🚀 Installation

#### Prerequisites
- PHP 7.4 or higher
- Web server (Apache, Nginx, or PHP built-in server)
- Write permissions for `data/` and `uploads/` directories

#### Quick Start

**Access the application**
- **Public Website**: `http://localhost:8000/index.php` or `http://yourdomain.com/index.php`
- **Admin Panel**: `http://localhost:8000/admin.php` or `http://yourdomain.com/admin.php`
- **Team Portal**: `http://localhost:8000/team.php` or `http://yourdomain.com/team.php`

#### Default Credentials

**Admin Panel:**
- Username: `admin`
- Password: `password`

**Team Member Portal (Test Accounts):**

All team members use the same password: `password123`

| Name | Email | Role |
|------|-------|------|
| Dr. Ayşe Yılmaz | a.yilmaz@kayralabweb.com | Lab Director |
| Dr. Mehmet Demir | m.demir@kayralabweb.com | Senior Researcher |
| Dr. Zeynep Kara | z.kara@kayralabweb.com | Research Scientist |
| Dr. Can Özkan | c.ozkan@kayralabweb.com | Postdoc Researcher |
| Dr. Selin Arslan | s.arslan@kayralabweb.com | Bioinformatics Specialist |

*Change these credentials immediately in production!*

### 📚 User Guide

#### Admin Panel Usage

1. **Managing Projects**
   - Navigate to "Projects" tab
   - Click "Add New Project" to create
   - Fill in title, description, dates, status
   - Select team members from checkboxes
   - Add external collaborators if needed
   - Upload project image and articles (after saving)

2. **Managing Team Members**
   - Go to "Team" tab
   - Click "Add Team Member"
   - Fill in basic info (name, title, bio, email)
   - Enable portal access and set password
   - View assigned projects and activity logs for existing members

3. **Article Management**
   - Edit an existing project
   - Scroll to "Research Articles" section
   - Click "Upload Article"
   - Enter article title and select PDF file
   - Articles appear on public website automatically

4. **Theme Customization**
   - Go to "Theme Colors" tab
   - Adjust RGB sliders for primary, secondary, and accent colors
   - See real-time preview
   - Click "Save Colors"

5. **SEO Management**
   - Navigate to "SEO Settings" tab
   - Enter unlock password: `Please Contact alikayracatalkaya@gmail.com`
   - Edit meta tags, Open Graph, Twitter Cards
   - Save changes

#### Team Member Portal Usage

1. **Login**
   - Visit `team.php`
   - Enter email and password
   - Access personal dashboard

2. **Managing Projects**
   - Click on any assigned project card
   - Edit status (Ongoing/Ended)
   - Update description and dates
   - Upload research articles
   - Changes are logged automatically

3. **Profile Updates**
   - Go to "My Profile" tab
   - Edit bio and LinkedIn URL
   - Upload profile image
   - Save changes

4. **Changing Password**
   - Go to "Change Password" tab
   - Enter current password
   - Enter and confirm new password
   - Submit

### 🎨 Customization

#### Theme Colors

Colors are managed in `data/config.json` under the `theme` key:

```json
"theme": {
    "primary": "59, 130, 246",    // RGB values
    "secondary": "139, 92, 246",
    "accent": "236, 72, 153"
}
```

Or use the admin panel's "Theme Colors" tab for visual editing.

#### Page Visibility

Toggle sections in `data/config.json`:

```json
"active_pages": {
    "about": true,
    "projects": true,
    "team": true,
    "gallery": true,
    "contact": true
}
```

### 🔒 Security Features

- **Password Hashing**: bcrypt with cost factor 10
- **Session Management**: Secure session handling
- **Role-Based Access**: Granular permission system
- **Activity Logging**: Complete audit trail
- **File Upload Validation**: Type and size checks
- **Protected SEO Settings**: Additional password layer
- **Non-Deletable Logs**: Audit trail integrity

### 📊 Activity Logging

All actions are automatically logged with:
- User identification (admin or team member)
- Action type (login, update, delete, upload, etc.)
- Timestamp and IP address
- Detailed description and JSON details
- Non-deletable audit trail

View logs in Admin Panel → Activity Logs tab.

### 🌐 Browser Support

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

### 📱 Mobile Features

- Fully responsive design
- Touch-friendly navigation
- Optimized modals and forms
- Horizontal swipe/drag scrolling
- Mobile menu with smooth animations

### 🐛 Troubleshooting

**Problem**: Cannot upload files
- **Solution**: Check `uploads/` directory permissions (755 or 777)

**Problem**: JSON errors
- **Solution**: Validate JSON files syntax, ensure proper UTF-8 encoding

**Problem**: Session not persisting
- **Solution**: Check PHP session configuration, ensure write permissions for session directory

**Problem**: Theme colors not updating
- **Solution**: Clear browser cache, check `data/config.json` write permissions

### 💼 Commercial Use & Licensing

**Important Notice:**

This platform was originally developed for research laboratories but is **fully adaptable for corporate and institutional use** including:
- Corporate Research Centers
- Educational Institutions
- Healthcare Organizations
- Technology Companies
- Consulting Firms
- Any organization requiring project and team management

**Licensing Information:**
- The complete project files are **NOT FREE**
- For commercial use, custom development, or full source code access
- Please contact: **alikayracatalkaya@gmail.com**

**What's Included in Purchase:**
- Full source code with documentation
- Custom theme and branding
- Technical support and updates
- Installation assistance
- Custom feature development available

### 📧 Support & Contact

For support, licensing inquiries, or custom development:
- **Email**: alikayracatalkaya@gmail.com
- **Demo Site**: https://kyra.tr/lab

---

<a name="türkçe"></a>
## 📖 Türkçe Dokümantasyon

### 🎯 Genel Bakış

**KayraLabWeb**, araştırma laboratuvarları, akademik kurumlar ve bilimsel organizasyonlar için tasarlanmış kapsamlı, tam özellikli bir web sitesi ve yönetim platformudur. Basitlik ve verimlilik göz önünde bulundurularak geliştirilmiş olup, güçlü bir yönetici paneli, ekip üyesi portalı ve halka açık web sitesi sunar - hepsi tek, zarif bir çözümde.

### ✨ Ana Özellikler

#### 🌐 Halka Açık Web Sitesi (`index.php`)
- **Responsive Tasarım**: Tailwind CSS ile tamamen mobil optimize
- **Dinamik Bölümler**: Hero, Ekip, Hakkımızda, Projeler, Galeri, İletişim
- **Akıcı Animasyonlar**: Scroll-tetiklemeli animasyonlar ve yumuşak geçişler
- **Yatay Kaydırma**: Projeler, ekip ve galeri için mouse wheel ile yatay gezinme
- **Proje Vitrini**: Modal görünümlerle detaylı proje kartları
- **Çoklu Makale Desteği**: Her proje için birden fazla araştırma makalesi
- **Ekip Profilleri**: LinkedIn entegrasyonlu profesyonel ekip kartları
- **Galeri Sistemi**: Kategorilere göre organize edilmiş görsel galerisi
- **Tema Özelleştirme**: Admin panelinden yönetilen dinamik RGB renk temaları

#### 🔐 Yönetici Paneli (`admin.php`)
- **Komple İçerik Yönetimi**: Tüm web sitesi içeriğini tek yerden yönetin
- **Proje Yönetimi**: Ekip atamalı proje oluşturma, düzenleme, silme
- **Ekip Yönetimi**:
  - Portal erişimli ekip üyesi ekleme/düzenleme
  - Şifre yönetimi (hem hashlenmiş hem açık metin görünür)
  - Üye başına atanan projeleri görüntüleme
  - Aktivite takibi ve istatistikler
- **Galeri Yönetimi**: Kategorilerle görsel yükleme ve organize etme
- **Ayarlar Kontrolü**:
  - Site geneli tema renkleri (RGB özelleştirme)
  - Sayfa görünürlüğü değiştirme
  - SEO yönetimi (ek şifre ile korumalı)
  - İletişim bilgileri
- **Makale Yönetimi**: Proje başına birden fazla araştırma makalesi yükleme
- **Admin Kullanıcıları**: Granüler izinlerle rol tabanlı erişim kontrolü
- **Aktivite Logları**:
  - Tüm işlemlerin kapsamlı kaydı
  - Kullanıcı tipi, tarih, işlem bazlı filtreleme
  - Silinemez denetim izi
  - Gerçek zamanlı istatistikler

#### 👥 Ekip Üyesi Portalı (`team.php`)
- **Kişisel Panel**: Ekip üyeleri için güvenli giriş
- **Proje Yönetimi**:
  - Atanan projeleri görüntüleme
  - Proje durumu, açıklama, tarihleri düzenleme
  - Araştırma makalesi yükleme
- **Profil Yönetimi**: Bio, LinkedIn, profil resmi güncelleme
- **Şifre Değiştirme**: Doğrulamalı güvenli şifre güncelleme
- **Aktivite Takibi**: Tüm işlemler otomatik kaydedilir
- **Tema Entegrasyonu**: Admin tanımlı renk şemasını devralır

### 🛠️ Teknoloji Yığını

- **Backend**: PHP 7.4+ (Saf PHP, framework yok)
- **Frontend**: HTML5, Tailwind CSS 3.0, Vanilla JavaScript
- **Veri Depolama**: JSON dosyaları (veritabanı gerekmez)
- **Kimlik Doğrulama**: bcrypt ile güvenli şifre hashleme
- **Dosya Yönetimi**: Görseller ve PDF'ler için organize yükleme sistemi
- **İkonlar**: Font Awesome 6.0

### 📁 Proje Yapısı

```
SAYGIDEGERLAB/
├── index.php                 # Halka açık web sitesi
├── admin.php                 # Yönetici paneli
├── team.php                  # Ekip üyesi portalı
│
├── includes/
│   ├── functions.php         # Temel fonksiyonlar (auth, dosya işleme vb.)
│   ├── api.php               # Admin API endpoint'leri
│   └── team_api.php          # Ekip üyesi API endpoint'leri
│
├── data/
│   ├── config.json           # Site ayarları & tema renkleri
│   ├── projects.json         # Makaleli projeler
│   ├── team.json             # Kimlik bilgileri ile ekip üyeleri
│   ├── gallery.json          # Galeri görselleri
│   ├── about.json            # Hakkımızda sayfası içeriği
│   ├── footer.json           # Footer içeriği
│   ├── admins.json           # Admin kullanıcılar & izinler
│   ├── seo.json              # SEO metadataları
│   └── activity_log.json     # Aktivite logları
│
└── uploads/
    ├── projects/             # Proje görselleri
    ├── team/                 # Ekip üyesi fotoğrafları
    ├── gallery/              # Galeri görselleri
    ├── articles/             # Araştırma makalesi PDF'leri
    └── general/              # Çeşitli yüklemeler
```

### 🚀 Kurulum

#### Gereksinimler
- PHP 7.4 veya üzeri
- Web sunucusu (Apache, Nginx veya PHP yerleşik sunucu)
- `data/` ve `uploads/` dizinleri için yazma izinleri

#### Hızlı Başlangıç

**Uygulamaya erişin**
- **Halka Açık Site**: `http://localhost:8000/index.php` veya `http://siteniz.com/index.php`
- **Admin Paneli**: `http://localhost:8000/admin.php` veya `http://siteniz.com/admin.php`
- **Ekip Portalı**: `http://localhost:8000/team.php` veya `http://siteniz.com/team.php`

#### Varsayılan Kimlik Bilgileri

**Admin Paneli:**
- Kullanıcı Adı: `admin`
- Şifre: `password`

**Ekip Üyesi Portalı (Test Hesapları):**

Tüm ekip üyeleri aynı şifreyi kullanır: `password123`

| İsim | Email | Rol |
|------|-------|-----|
| Dr. Ayşe Yılmaz | a.yilmaz@kayralabweb.com | Lab Direktörü |
| Dr. Mehmet Demir | m.demir@kayralabweb.com | Kıdemli Araştırmacı |
| Dr. Zeynep Kara | z.kara@kayralabweb.com | Araştırma Bilim İnsanı |
| Dr. Can Özkan | c.ozkan@kayralabweb.com | Postdoc Araştırmacı |
| Dr. Selin Arslan | s.arslan@kayralabweb.com | Biyoinformatik Uzmanı |

*Bu kimlik bilgilerini production'da hemen değiştirin!*

### 📚 Kullanım Kılavuzu

#### Admin Paneli Kullanımı

1. **Proje Yönetimi**
   - "Projects" sekmesine gidin
   - Oluşturmak için "Add New Project" tıklayın
   - Başlık, açıklama, tarihler, durum bilgilerini doldurun
   - Checkbox'lardan ekip üyelerini seçin
   - Gerekirse harici işbirlikçiler ekleyin
   - Proje görseli ve makaleleri yükleyin (kaydettikten sonra)

2. **Ekip Üyesi Yönetimi**
   - "Team" sekmesine gidin
   - "Add Team Member" tıklayın
   - Temel bilgileri doldurun (ad, unvan, bio, email)
   - Portal erişimini aktifleştirin ve şifre belirleyin
   - Mevcut üyeler için atanan projeleri ve aktivite loglarını görüntüleyin

3. **Makale Yönetimi**
   - Mevcut bir projeyi düzenleyin
   - "Research Articles" bölümüne kaydırın
   - "Upload Article" tıklayın
   - Makale başlığını girin ve PDF dosyasını seçin
   - Makaleler otomatik olarak halka açık sitede görünür

4. **Tema Özelleştirme**
   - "Theme Colors" sekmesine gidin
   - Primary, secondary ve accent renkler için RGB kaydırıcıları ayarlayın
   - Gerçek zamanlı önizleme görün
   - "Save Colors" tıklayın

5. **SEO Yönetimi**
   - "SEO Settings" sekmesine gidin
   - Kilit açma şifresi için: `alikayracatalkaya@gmail.com adresine mail atın`
   - Meta etiketleri, Open Graph, Twitter Cards düzenleyin
   - Değişiklikleri kaydedin

#### Ekip Üyesi Portalı Kullanımı

1. **Giriş**
   - `team.php` adresini ziyaret edin
   - Email ve şifrenizi girin
   - Kişisel panonuza erişin

2. **Proje Yönetimi**
   - Atanan herhangi bir proje kartına tıklayın
   - Durumu düzenleyin (Ongoing/Ended)
   - Açıklama ve tarihleri güncelleyin
   - Araştırma makaleleri yükleyin
   - Değişiklikler otomatik loglanır

3. **Profil Güncellemeleri**
   - "My Profile" sekmesine gidin
   - Bio ve LinkedIn URL'ini düzenleyin
   - Profil resmi yükleyin
   - Değişiklikleri kaydedin

4. **Şifre Değiştirme**
   - "Change Password" sekmesine gidin
   - Mevcut şifreyi girin
   - Yeni şifreyi girin ve onaylayın
   - Gönder

### 🎨 Özelleştirme

#### Tema Renkleri

Renkler `data/config.json` dosyasında `theme` anahtarı altında yönetilir:

```json
"theme": {
    "primary": "59, 130, 246",    // RGB değerleri
    "secondary": "139, 92, 246",
    "accent": "236, 72, 153"
}
```

Veya görsel düzenleme için admin panelinin "Theme Colors" sekmesini kullanın.

#### Sayfa Görünürlüğü

`data/config.json` içinde bölümleri değiştirin:

```json
"active_pages": {
    "about": true,
    "projects": true,
    "team": true,
    "gallery": true,
    "contact": true
}
```

### 🔒 Güvenlik Özellikleri

- **Şifre Hashleme**: Maliyet faktörü 10 ile bcrypt
- **Oturum Yönetimi**: Güvenli oturum işleme
- **Rol Tabanlı Erişim**: Granüler izin sistemi
- **Aktivite Loglama**: Tam denetim izi
- **Dosya Yükleme Doğrulama**: Tip ve boyut kontrolleri
- **Korumalı SEO Ayarları**: Ek şifre katmanı
- **Silinemez Loglar**: Denetim izi bütünlüğü

### 📊 Aktivite Loglama

Tüm işlemler otomatik olarak şunlarla kaydedilir:
- Kullanıcı tanımlama (admin veya ekip üyesi)
- İşlem tipi (giriş, güncelleme, silme, yükleme vb.)
- Zaman damgası ve IP adresi
- Detaylı açıklama ve JSON detayları
- Silinemez denetim izi

Logları görüntülemek için Admin Panel → Activity Logs sekmesi.

### 🌐 Tarayıcı Desteği

- Chrome/Edge (en son)
- Firefox (en son)
- Safari (en son)
- Mobil tarayıcılar (iOS Safari, Chrome Mobile)

### 📱 Mobil Özellikler

- Tamamen responsive tasarım
- Dokunma dostu navigasyon
- Optimize edilmiş modaller ve formlar
- Yatay swipe/drag kaydırma
- Yumuşak animasyonlu mobil menü

### 🐛 Sorun Giderme

**Sorun**: Dosya yüklenemiyor
- **Çözüm**: `uploads/` dizin izinlerini kontrol edin (755 veya 777)

**Sorun**: JSON hataları
- **Çözüm**: JSON dosya sözdizimini doğrulayın, düzgün UTF-8 kodlamasını sağlayın

**Sorun**: Oturum korunmuyor
- **Çözüm**: PHP oturum yapılandırmasını kontrol edin, oturum dizini için yazma izinlerini sağlayın

**Sorun**: Tema renkleri güncellenmiyor
- **Çözüm**: Tarayıcı önbelleğini temizleyin, `data/config.json` yazma izinlerini kontrol edin

### 💼 Ticari Kullanım ve Lisanslama

**Önemli Bilgilendirme:**

Bu platform orijinal olarak araştırma laboratuvarları için geliştirilmiştir ancak **kurumsal ve ticari kullanım için tam uyarlanabilir**:
- Kurumsal Araştırma Merkezleri
- Eğitim Kurumları
- Sağlık Organizasyonları
- Teknoloji Şirketleri
- Danışmanlık Firmaları
- Proje ve ekip yönetimine ihtiyaç duyan her organizasyon

**Lisans Bilgileri:**
- Projenin tam dosyaları **ÜCRETSİZ DEĞİLDİR**
- Ticari kullanım, özel geliştirme veya tam kaynak kod erişimi için
- Lütfen iletişime geçin: **alikayracatalkaya@gmail.com**

**Satın Alma ile Dahil Olanlar:**
- Dokümantasyonlu tam kaynak kodu
- Özel tema ve markalama
- Teknik destek ve güncellemeler
- Kurulum yardımı
- Özel özellik geliştirme seçeneği

### 📧 Destek ve İletişim

Destek, lisans sorguları veya özel geliştirme için:
- **Email**: alikayracatalkaya@gmail.com
- **Demo Site**: info@kayralabweb.com

---

## 🎓 Credits

**Developed by:** Kayra Çatalkaya  
**Project:** KayraLabWeb - Laboratory Management Platform  
**Year:** 2025  
**Mockup Data:** 'ays Tech

---

## ⭐ Features at a Glance

| Feature | Admin | Team | Public |
|---------|-------|------|--------|
| View Projects | ✅ | ✅ | ✅ |
| Edit Projects | ✅ | ✅ (assigned) | ❌ |
| Delete Projects | ✅ | ❌ | ❌ |
| Upload Articles | ✅ | ✅ (assigned) | ❌ |
| Manage Team | ✅ | ❌ | ❌ |
| Edit Own Profile | ✅ | ✅ | ❌ |
| View Activity Logs | ✅ | ❌ | ❌ |
| Theme Customization | ✅ | ❌ | ❌ |
| SEO Management | ✅ (with password) | ❌ | ❌ |

---

## 🚀 Quick Links

- **Purchase Full License**: alikayracatalkaya@gmail.com
- **Request Custom Features**: alikayracatalkaya@gmail.com
- **Technical Support**: alikayracatalkaya@gmail.com
- **Demo & Consultation**: info@kayralabweb.com

---

## 📌 Disclaimer

This is a demonstration version. For full functionality and commercial deployment, please contact alikayracatalkaya@gmail.com for licensing.

---

**Made with ❤️ for research institutions and organizations worldwide**
