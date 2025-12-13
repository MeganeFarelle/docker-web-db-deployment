# Déploiement de services – Stack Docker Web & Base de Données

## 📌 Contexte
Ce projet a été réalisé dans le cadre du module **R5082 – Déploiement de services**.  
L’objectif est de concevoir et déployer une architecture Dockerisée comprenant plusieurs services interconnectés, conformément aux bonnes pratiques DevOps.

---

## 🎯 Objectifs du projet
- Mettre en place **plusieurs conteneurs Docker importables**
- Déployer un **serveur Web** (Nginx + PHP)
- Déployer un **serveur de base de données SQL** (MySQL)
- Fournir un environnement de développement classique (PHP, JavaScript)
- Intégrer **phpMyAdmin** pour l’administration de la base
- Orchestrer l’ensemble via **Docker Compose**
- Gérer les **volumes**, **ports** et **réseaux**

---

## 🧱 Architecture de la solution

La stack est composée de trois services principaux :

### 🔹 Web
- Nginx
- PHP 8.3 (PHP-FPM)
- JavaScript

### 🔹 Base de données
- MySQL 8.4
- Initialisation automatique via script SQL

### 🔹 Administration
- phpMyAdmin 5.2

L’ensemble des services communique via un **réseau Docker interne**, garantissant isolation et sécurité.

---

## 📁 Structure du projet

docker-web-db-deployment/
├── compose.yaml
├── README.md
├── .env.example
│
├── web/
│ ├── Dockerfile
│ ├── nginx.conf
│ └── src/
│ ├── index.php
│ └── script.js
│
└── db/
├── Dockerfile
└── init/
└── 01_schema.sql


---

## ⚙️ Détails de configuration

### 🖥️ Service Web
- Image Docker personnalisée basée sur `php:8.3-fpm`
- Serveur Nginx configuré manuellement
- Page PHP permettant :
  - de tester l’exécution PHP
  - de vérifier la connexion à la base MySQL
  - d’afficher une donnée issue de la base
- Script JavaScript chargé côté client

### 🗄️ Service Base de données
- Image Docker personnalisée basée sur `mysql:8.4`
- Script SQL exécuté automatiquement au premier démarrage
- Données persistées via un volume Docker

### 🛠️ phpMyAdmin
- Accès à la base via le réseau Docker interne
- Interface web d’administration MySQL

---

## 🔐 Variables d’environnement

Les variables sensibles sont externalisées dans un fichier `.env`.

Exemple (`.env.example`) :

```env
MYSQL_ROOT_PASSWORD=root
MYSQL_DATABASE=appdb
MYSQL_USER=appuser
MYSQL_PASSWORD=apppass

▶️ Lancement du projet

🔧 Prérequis
Docker Desktop
Docker Compose v2


▶️ Démarrage

docker compose up -d


⏹️ Arrêt

docker compose down


🌐 Accès aux services

Application	http://localhost:8080
phpMyAdmin	http://localhost:8082


🔑 Identifiants MySQL

Serveur : db
Base : appdb
Utilisateur : appuser
Mot de passe : apppass



✅ Résultats obtenus

La page web affiche un message de succès PHP
La connexion MySQL est fonctionnelle
Les données sont lues depuis la base
La base est initialisée automatiquement
phpMyAdmin permet de visualiser et administrer les données



🧠 Bonnes pratiques appliquées

Séparation claire des services
Conteneurs indépendants et modulaires
Variables sensibles non versionnées
Base de données non exposée sur l’hôte
Utilisation d’un réseau Docker interne
Persistance des données via volumes



🎓 Conclusion

Ce projet démontre la mise en œuvre complète d’un environnement Dockerisé Web + Base de données, respectant les principes de modularité, de sécurité et de reproductibilité, conformément aux attentes du module R5082.