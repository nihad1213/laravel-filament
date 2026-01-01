# Game Database Logic

## Core Entities

### 1. Games
The central entity representing video games.

**Fields:**
- `id` - Primary key
- `title` - String (required)
- `description` - Text
- `release_date` - Date
- `cover_image` - String (file path)
- `metacritic_score` - Integer (0-100, nullable)
- `price` - Decimal (nullable)
- `status` - Enum (announced, in_development, released, cancelled)
- `created_at` - Timestamp
- `updated_at` - Timestamp

**Relations:**
- belongsToMany: Designers (through game_designer pivot)
- belongsToMany: Publishers (through game_publisher pivot)
- belongsToMany: Platforms
- belongsToMany: Genres
- belongsToMany: Tags
- hasMany: Screenshots
- hasMany: Reviews
- hasMany: DLCs (self-referential, parent game)

---

### 2. Designers (Game Developers/Studios)
Companies or individuals who develop games.

**Fields:**
- `id` - Primary key
- `name` - String (required)
- `description` - Text
- `logo` - String (file path)
- `founded_date` - Date
- `country` - String
- `website` - String
- `is_indie` - Boolean
- `employee_count` - Enum (1-10, 11-50, 51-200, 201-500, 500+)
- `status` - Enum (active, defunct, acquired)
- `created_at` - Timestamp
- `updated_at` - Timestamp

**Relations:**
- belongsToMany: Games

---

### 3. Publishers
Companies that publish and distribute games.

**Fields:**
- `id` - Primary key
- `name` - String (required)
- `description` - Text
- `logo` - String (file path)
- `founded_date` - Date
- `country` - String
- `website` - String
- `status` - Enum (active, defunct, acquired)
- `created_at` - Timestamp
- `updated_at` - Timestamp

**Relations:**
- belongsToMany: Games
---

### 4. Platforms
Gaming platforms/systems where games can be played.

**Fields:**
- `id` - Primary key
- `name` - String (required) - e.g., "PlayStation 5", "PC", "Xbox Series X"
- `slug` - String (unique)
- `manufacturer` - String - e.g., "Sony", "Microsoft", "Nintendo"
- `type` - Enum (console, pc, mobile, handheld, vr)
- `release_date` - Date
- `icon` - String (file path)
- `is_active` - Boolean
- `created_at` - Timestamp
- `updated_at` - Timestamp

**Relations:**
- belongsToMany: Games

---

### 5. Genres
Game genres/categories.

**Fields:**
- `id` - Primary key
- `name` - String (required) - e.g., "Action", "RPG", "Strategy"
- `description` - Text
- `created_at` - Timestamp
- `updated_at` - Timestamp

**Relations:**
- belongsToMany: Games
- belongsTo: Parent Genre (for sub-genres)
- hasMany: Child Genres (sub-genres)

---

### 6. Tags
Flexible tagging system for game features/characteristics.

**Fields:**
- `id` - Primary key
- `name` - String (required) - e.g., "Multiplayer", "Open World", "Roguelike"
- `type` - Enum (feature, theme, gameplay, setting) - optional categorization
- `created_at` - Timestamp
- `updated_at` - Timestamp

**Relations:**
- belongsToMany: Games

---

### 7. Screenshots
Game screenshots and media.

**Fields:**
- `id` - Primary key
- `game_id` - Foreign key
- `image_path` - String (required)
- `created_at` - Timestamp
- `updated_at` - Timestamp

**Relations:**
- belongsTo: Game
---

## Pivot Tables & Additional Relations

### game_designer (Many-to-Many)
- `game_id`
- `designer_id`
- `role` - Enum (lead_developer, co_developer, support, port) - optional

### game_publisher (Many-to-Many)
- `game_id`
- `publisher_id`
- `region` - Enum (global, north_america, europe, asia, other) - optional
- `publish_date` - Date (can differ by region)

### game_platform (Many-to-Many)
- `game_id`
- `platform_id`
- `release_date` - Date (can differ by platform)

### game_genre (Many-to-Many)
- `game_id`
- `genre_id`
- `is_primary` - Boolean (mark primary genre)

### game_tag (Many-to-Many)
- `game_id`
- `tag_id`

---

## Optional Extended Entities

### 8. DLCs (Downloadable Content)
Additional content for games.

**Fields:**
- `id` - Primary key
- `parent_game_id` - Foreign key (references games)
- `title` - String (required)
- `description` - Text
- `release_date` - Date
- `price` - Decimal
- `type` - Enum (expansion, dlc, season_pass, cosmetic)
- `created_at` - Timestamp
- `updated_at` - Timestamp

**Relations:**
- belongsTo: Game (as parent_game)
---

### 11. Awards
Game industry awards.

**Fields:**
- `id` - Primary key
- `name` - String (required) - e.g., "Game of the Year"
- `organization` - String - e.g., "The Game Awards"
- `year` - Integer
- `game_id` - Foreign key
- `category` - String
- `created_at` - Timestamp
- `updated_at` - Timestamp

**Relations:**
- belongsTo: Game

---