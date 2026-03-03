# Database Schema Analysis: chronevo.sql

**Scope:** Full structure of `./_db/chronevo.sql` (WordPress + ACF).  
**Constraints:** Per README.md — no assumptions, methodical, technically rigorous, senior-level architectural scrutiny.

---

## 1. Overview and Structure

- **Engine:** MariaDB 10.4.32; charset `utf8mb4` / collation `utf8mb4_unicode_520_ci` on all tables.
- **Tables:** 11 core tables: `wp_commentmeta`, `wp_comments`, `wp_links`, `wp_options`, `wp_postmeta`, `wp_posts`, `wp_termmeta`, `wp_terms`, `wp_term_relationships`, `wp_term_taxonomy`, `wp_usermeta`, `wp_users`.
- **Storage engine:** InnoDB for all (implicit from ALTER TABLE indexes).
- **Naming:** Consistent `wp_` prefix; lowercase with underscores; table names plural where appropriate (e.g. `wp_posts`, `wp_users`).

---

## 2. Tables, Columns, Data Types, and Constraints

### 2.1 wp_commentmeta

| Column      | Type         | Nullable | Default | Notes                    |
|------------|--------------|----------|---------|--------------------------|
| meta_id    | bigint(20) UNSIGNED | NO  | —       | Surrogate key            |
| comment_id | bigint(20) UNSIGNED | NO  | 0       | References wp_comments   |
| meta_key   | varchar(255) | YES      | NULL    | EAV key                  |
| meta_value | longtext     | YES      | NULL    | EAV value                |

- **Primary key:** `meta_id`.
- **Indexes:** `comment_id`, `meta_key`(191).
- **Integrity:** No foreign key; referential integrity to `wp_comments.comment_ID` is application-level.

### 2.2 wp_comments

| Column             | Type         | Nullable | Default | Notes                |
|--------------------|--------------|----------|---------|----------------------|
| comment_ID        | bigint(20) UNSIGNED | NO  | —       | PK                   |
| comment_post_ID   | bigint(20) UNSIGNED | NO  | 0       | Post reference       |
| comment_author    | tinytext     | NO       | —       |                     |
| comment_author_email | varchar(100) | NO  | ''      |                     |
| comment_author_url  | varchar(200) | NO  | ''      |                     |
| comment_author_IP   | varchar(100) | NO  | ''      |                     |
| comment_date      | datetime     | NO       | '0000-00-00 00:00:00' | Deprecated zero-date |
| comment_date_gmt  | datetime     | NO       | '0000-00-00 00:00:00' | Deprecated zero-date |
| comment_content   | text         | NO       | —       |                     |
| comment_karma     | int(11)      | NO       | 0       |                     |
| comment_approved  | varchar(20)  | NO       | '1'     |                     |
| comment_agent     | varchar(255) | NO       | ''      |                     |
| comment_type      | varchar(20)  | NO       | 'comment' |                  |
| comment_parent    | bigint(20) UNSIGNED | NO  | 0       | Self-reference       |
| user_id           | bigint(20) UNSIGNED | NO  | 0       | User reference       |

- **Primary key:** `comment_ID`.
- **Indexes:** `comment_post_ID`, `comment_approved_date_gmt` (compound), `comment_date_gmt`, `comment_parent`, `comment_author_email`(10).
- **Integrity:** No FK; `comment_post_ID` and `user_id` are logical FKs to `wp_posts.ID` and `wp_users.ID`.

### 2.3 wp_links

| Column           | Type         | Nullable | Default | Notes    |
|------------------|--------------|----------|---------|----------|
| link_id          | bigint(20) UNSIGNED | NO  | —       | PK       |
| link_url         | varchar(255) | NO       | ''      |          |
| link_name        | varchar(255) | NO       | ''      |          |
| link_image       | varchar(255) | NO       | ''      |          |
| link_target      | varchar(25)  | NO       | ''      |          |
| link_description | varchar(255) | NO       | ''      |          |
| link_visible     | varchar(20)  | NO       | 'Y'     |          |
| link_owner       | bigint(20) UNSIGNED | NO  | 1       | User ID  |
| link_rating      | int(11)      | NO       | 0       |          |
| link_updated     | datetime     | NO       | '0000-00-00 00:00:00' | |
| link_rel         | varchar(255) | NO       | ''      |          |
| link_notes       | mediumtext   | NO       | —       |          |
| link_rss         | varchar(255) | NO       | ''      |          |

- **Primary key:** `link_id`.
- **Index:** `link_visible`.
- **Note:** Legacy WordPress “Blogroll”; often unused.

### 2.4 wp_options

| Column       | Type         | Nullable | Default | Notes     |
|--------------|--------------|----------|---------|-----------|
| option_id    | bigint(20) UNSIGNED | NO  | —       | PK        |
| option_name  | varchar(191) | NO       | ''      | Unique    |
| option_value | longtext     | NO       | —       | Serialized often |
| autoload     | varchar(20)  | NO       | 'yes'   |           |

- **Primary key:** `option_id`.
- **Unique key:** `option_name`.
- **Index:** `autoload`.
- **Integrity:** option_name length 191 aligns with InnoDB index key limit (191 for utf8mb4).

### 2.5 wp_postmeta

| Column     | Type         | Nullable | Default | Notes              |
|------------|--------------|----------|---------|--------------------|
| meta_id    | bigint(20) UNSIGNED | NO  | —       | PK                 |
| post_id    | bigint(20) UNSIGNED | NO  | 0       | References wp_posts |
| meta_key   | varchar(255) | YES      | NULL    | EAV key (ACF, etc.) |
| meta_value | longtext     | YES      | NULL    | EAV value          |

- **Primary key:** `meta_id`.
- **Indexes:** `post_id`, `meta_key`(191).
- **Integrity:** No FK; `post_id` is logical FK to `wp_posts.ID`. ACF and core store custom fields here.

### 2.6 wp_posts

| Column                | Type         | Nullable | Default | Notes     |
|-----------------------|--------------|----------|---------|-----------|
| ID                    | bigint(20) UNSIGNED | NO  | —       | PK        |
| post_author           | bigint(20) UNSIGNED | NO  | 0       | User ID   |
| post_date             | datetime     | NO       | '0000-00-00 00:00:00' | |
| post_date_gmt         | datetime     | NO       | '0000-00-00 00:00:00' | |
| post_content         | longtext     | NO       | —       |           |
| post_title            | text         | NO       | —       |           |
| post_excerpt          | text         | NO       | —       |           |
| post_status           | varchar(20)  | NO       | 'publish' |          |
| comment_status        | varchar(20)  | NO       | 'open'  |           |
| ping_status           | varchar(20)  | NO       | 'open'  |           |
| post_password         | varchar(255) | NO       | ''      |           |
| post_name             | varchar(200) | NO       | ''      | Slug      |
| to_ping               | text         | NO       | —       |           |
| pinged                | text         | NO       | —       |           |
| post_modified         | datetime     | NO       | '0000-00-00 00:00:00' | |
| post_modified_gmt     | datetime     | NO       | '0000-00-00 00:00:00' | |
| post_content_filtered | longtext     | NO       | —       |           |
| post_parent           | bigint(20) UNSIGNED | NO  | 0       | Hierarchy |
| guid                  | varchar(255) | NO       | ''      |           |
| menu_order            | int(11)      | NO       | 0       |           |
| post_type             | varchar(20)  | NO       | 'post'  |           |
| post_mime_type        | varchar(100) | NO       | ''      |           |
| comment_count         | bigint(20)   | NO       | 0       |           |

- **Primary key:** `ID`.
- **Indexes:** `post_name`(191), `type_status_date` (post_type, post_status, post_date, ID), `post_parent`, `post_author`, `type_status_author` (post_type, post_status, post_author).
- **Integrity:** post_author → wp_users.ID; post_parent → wp_posts.ID (logical). post_type covers page, post, attachment, nav_menu_item, acf-field, acf-field-group, etc.

### 2.7 wp_termmeta

| Column     | Type         | Nullable | Default | Notes          |
|------------|--------------|----------|---------|----------------|
| meta_id    | bigint(20) UNSIGNED | NO  | —       | PK             |
| term_id    | bigint(20) UNSIGNED | NO  | 0       | Term reference |
| meta_key   | varchar(255) | YES      | NULL    | EAV key        |
| meta_value | longtext     | YES      | NULL    | EAV value      |

- **Primary key:** `meta_id`.
- **Indexes:** `term_id`, `meta_key`(191).
- **Integrity:** term_id references wp_terms.term_id (via wp_term_taxonomy in practice).

### 2.8 wp_terms

| Column     | Type             | Nullable | Default | Notes |
|------------|------------------|----------|---------|-------|
| term_id    | bigint(20) UNSIGNED | NO    | —       | PK    |
| name       | varchar(200)     | NO       | ''      |       |
| slug       | varchar(200)      | NO       | ''      |       |
| term_group | bigint(10)        | NO       | 0       |       |

- **Primary key:** `term_id`.
- **Indexes:** `slug`(191), `name`(191).
- **Relationship:** Used with wp_term_taxonomy (term_id + taxonomy) and wp_term_relationships (object_id + term_taxonomy_id).

### 2.9 wp_term_relationships

| Column            | Type         | Nullable | Default | Notes        |
|-------------------|--------------|----------|---------|--------------|
| object_id         | bigint(20) UNSIGNED | NO  | 0       | Post/object   |
| term_taxonomy_id  | bigint(20) UNSIGNED | NO  | 0       | Taxonomy term |
| term_order        | int(11)      | NO       | 0       |              |

- **Primary key:** (object_id, term_taxonomy_id).
- **Index:** `term_taxonomy_id`.
- **Integrity:** object_id → wp_posts.ID; term_taxonomy_id → wp_term_taxonomy.term_taxonomy_id (many-to-many).

### 2.10 wp_term_taxonomy

| Column            | Type         | Nullable | Default | Notes   |
|-------------------|--------------|----------|---------|---------|
| term_taxonomy_id  | bigint(20) UNSIGNED | NO  | —       | PK      |
| term_id           | bigint(20) UNSIGNED | NO  | 0       |         |
| taxonomy          | varchar(32)  | NO       | ''      |         |
| description       | longtext     | NO       | —       |         |
| parent            | bigint(20) UNSIGNED | NO  | 0       |         |
| count             | bigint(20)   | NO       | 0       |         |

- **Primary key:** `term_taxonomy_id`.
- **Unique key:** (term_id, taxonomy).
- **Index:** `taxonomy`.
- **Integrity:** term_id → wp_terms.term_id. Taxonomies include category, nav_menu, wp_theme.

### 2.11 wp_usermeta

| Column     | Type         | Nullable | Default | Notes   |
|------------|--------------|----------|---------|---------|
| umeta_id   | bigint(20) UNSIGNED | NO  | —       | PK      |
| user_id    | bigint(20) UNSIGNED | NO  | 0       |         |
| meta_key   | varchar(255) | YES      | NULL    |         |
| meta_value | longtext     | YES      | NULL    |         |

- **Primary key:** `umeta_id`.
- **Indexes:** `user_id`, `meta_key`(191).
- **Integrity:** user_id → wp_users.ID (logical).

### 2.12 wp_users

| Column            | Type         | Nullable | Default | Notes     |
|-------------------|--------------|----------|---------|-----------|
| ID                | bigint(20) UNSIGNED | NO  | —       | PK        |
| user_login        | varchar(60)  | NO       | ''      |           |
| user_pass         | varchar(255) | NO       | ''      | Hashed    |
| user_nicename     | varchar(50)  | NO       | ''      |           |
| user_email        | varchar(100) | NO       | ''      |           |
| user_url          | varchar(100) | NO       | ''      |           |
| user_registered   | datetime     | NO       | '0000-00-00 00:00:00' | |
| user_activation_key | varchar(255) | NO    | ''      |           |
| user_status       | int(11)      | NO       | 0       |           |
| display_name      | varchar(250) | NO       | ''      |           |

- **Primary key:** `ID`.
- **Indexes:** `user_login`, `user_nicename`, `user_email`.
- **Integrity:** Central entity for authors and authentication.

---

## 3. Keys and Indexes Summary

- **Primary keys:** All tables have a single-column (or compound for wp_term_relationships) primary key; all AUTO_INCREMENT where applicable (except wp_term_relationships).
- **Unique:** wp_options.option_name; wp_term_taxonomy(term_id, taxonomy).
- **Non-unique indexes:** All FKs and common query columns (post_id, meta_key, comment_post_ID, type_status_date, etc.) are indexed. meta_key limited to 191 characters for InnoDB utf8mb4 key length.
- **No redundant indexes** identified in the dump; compound indexes (e.g. type_status_date) support typical WordPress queries.

---

## 4. Relationships

- **Posts ↔ Users:** wp_posts.post_author → wp_users.ID.
- **Posts ↔ Postmeta:** wp_postmeta.post_id → wp_posts.ID (1:N). ACF and core store custom fields here (e.g. image, award_video, show).
- **Posts ↔ Terms:** wp_posts.ID ↔ wp_term_relationships.object_id; wp_term_relationships.term_taxonomy_id → wp_term_taxonomy.term_taxonomy_id (N:M). wp_term_taxonomy.term_id → wp_terms.term_id.
- **Comments:** wp_comments.comment_post_ID → wp_posts.ID; wp_comments.user_id → wp_users.ID; wp_commentmeta.comment_id → wp_comments.comment_ID.
- **Links:** wp_links.link_owner → wp_users.ID (logical).
- **Usermeta:** wp_usermeta.user_id → wp_users.ID.

No declarative FOREIGN KEY constraints; relationships are enforced by application (WordPress/ACF).

---

## 5. Normalization

- **3NF in core entities:** wp_posts, wp_users, wp_terms, wp_term_taxonomy hold non-repeating, dependent-only-on-key attributes.
- **EAV (meta) tables:** wp_postmeta, wp_commentmeta, wp_termmeta, wp_usermeta are intentionally in 1NF (key-value); normalization is traded for schema flexibility (WordPress/ACF design).
- **wp_options:** Single table for all key-value options; acceptable for WordPress’s use; high churn on option_value (longtext).
- **Redundancy:** wp_posts.comment_count is a denormalized cache; WordPress maintains it for performance. Acceptable.

---

## 6. Data Integrity

- **Strengths:** PKs on all tables; unique where needed; NOT NULL on critical columns; default values used.
- **Gaps:** No FOREIGN KEY constraints — orphaned meta or relationships possible if data is manipulated outside WordPress. Zero-dates ('0000-00-00 00:00:00') are deprecated in strict SQL modes.
- **Recommendations:** Keep FKs omitted if adhering to core WordPress schema. For new custom tables, consider FKs and avoid zero-dates (use NULL or valid dates).

---

## 7. Performance

- **Index usage:** post_type, post_status, post_date, post_author, post_parent, post_name, meta_key, comment_post_ID, term_taxonomy_id, user_id, etc. are indexed, supporting typical WP queries and ACF lookups.
- **Meta tables:** Queries by (post_id, meta_key) or (user_id, meta_key) are index-friendly. Large meta_value (longtext) is not indexed and is appropriate.
- **Options:** option_name unique; autoload indexed for loading “autoload” options. option_value not indexed (by design).
- **Scalability:** For very large post/meta volume, consider partitioning or archiving; schema itself does not block scaling with proper indexing and caching.

---

## 8. Security (Schema Level)

- **Passwords:** wp_users.user_pass stores hashed passwords (e.g. bcrypt); no plaintext.
- **Sensitive data:** user_email, user_login, session tokens (in wp_usermeta) are present; access control is application and server responsibility.
- **SQL injection:** Mitigated by using prepared statements in WordPress/ACF; schema does not change that.
- **Recommendation:** Ensure wp_config.php and file permissions restrict DB credentials; principle of least privilege for DB user.

---

## 9. Scalability

- **Vertical:** Schema supports vertical scaling; InnoDB and indexing are appropriate.
- **Horizontal:** WordPress core is not designed for horizontal write scaling; read replicas can be used for read-heavy workloads. Meta and options tables can become hot; caching (object cache, e.g. Redis) is recommended.
- **Growth:** wp_postmeta and wp_options can grow large; periodic cleanup of transients and unused meta helps. ACF fields (e.g. image, award_video) add to postmeta volume but are standard.

---

## 10. Naming and Best Practices

- **Naming:** Consistent wp_ prefix; snake_lower for tables and columns; plural table names. Aligns with WordPress core.
- **Charset/collation:** utf8mb4 and utf8mb4_unicode_520_ci throughout — good for Unicode and sorting.
- **Engine:** InnoDB — supports transactions and row-level locking; appropriate for a CMS.
- **Best practices:** Indexes on join and filter columns; no unnecessary indexes in dump; key length truncation (191) for utf8mb4 meta_key is correct.

---

## 11. Summary and Recommendations

- **Structure:** Standard WordPress schema plus ACF-driven use of wp_posts (acf-field, acf-field-group) and wp_postmeta (image, award_video, show, etc.). Schema is consistent and well-indexed.
- **Integrity:** No FKs; zero-dates present. Acceptable for WordPress compatibility; for new custom tables consider stricter integrity and date handling.
- **Performance:** Indexing is appropriate; use object caching and optional query/meta caching for high traffic.
- **Security:** Credentials and access control are critical; schema stores hashed passwords and does not introduce obvious exposure.
- **Ref-about-awards-media:** About page awards media (image vs award_video) is driven by ACF fields stored in wp_postmeta (post_id = About page ID); theme logic correctly branches on get_field('image') and get_field('award_video').

This analysis is based solely on the structure and content of `./_db/chronevo.sql` and README.md constraints, with no assumptions beyond the dump and the stated directives.
