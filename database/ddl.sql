DROP DATABASE IF EXISTS db_accellera;
CREATE DATABASE db_accellera;
USE db_accellera;

-- Creazione della tabella `users`
CREATE TABLE users (
                       id bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                       is_manager int DEFAULT 0,
                       name varchar(255),
                       email varchar(255),
                       email_verified_at timestamp NULL DEFAULT NULL,
                       image VARCHAR(255) NOT NULL,
                       password varchar(255),
                       remember_token varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                       created_at timestamp NULL DEFAULT NULL,
                       updated_at timestamp NULL DEFAULT NULL
);




-- Creazione della tabella `repo`
/*
 una repo ha un p.manager (come admin)
 il p.manager ha la possibilità di creare più repo

 */
CREATE TABLE repo (
                           id bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                           name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                           project_manager_id bigint unsigned,
                           image VARCHAR(255),
                           created_at timestamp NULL DEFAULT NULL,
                           updated_at timestamp NULL DEFAULT NULL,
                           FOREIGN KEY (project_manager_id) REFERENCES users (id)
);

-- Creazione della tabella `projects`
/*
    un progetto ha un p.manager e viene assegnato per ogni repo.

*/
CREATE TABLE projects (
                          id bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                          title varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                          description varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,

                          project_manager_id bigint unsigned NOT NULL,
                          repo_id BIGINT UNSIGNED,

                          is_archived INT NOT NULL DEFAULT 0,
                          is_terminated INT NOT NULL DEFAULT 0,

                          created_at timestamp NULL DEFAULT NULL,
                          updated_at timestamp NULL DEFAULT NULL,
                          CONSTRAINT projects_project_manager_id_foreign
                              FOREIGN KEY (project_manager_id) REFERENCES users (id) ON DELETE CASCADE,
                          FOREIGN KEY (repo_id) REFERENCES repo(id) ON UPDATE CASCADE
                      );

-- UNA REPO HA PIU' PROGETTI
CREATE TABLE repo_projects(
    id_repo BIGINT UNSIGNED,
    id_project BIGINT UNSIGNED,
    FOREIGN KEY  (id_repo) references repo(id),
    foreign key (id_project) references repo(id)
);


-- Creazione della tabella `tasks`
/*
 OGNI TASK HA UN P.MANAGER,
 OGNI TASK VIENE ASSEGNATA A UN ID
 OGNI TASK VIENE ASSENGATA AD UNA PARTECIPAZIONE

 */
CREATE TABLE tasks (
                       id bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,

                       id_project bigint unsigned NOT NULL,
                       project_manager_id bigint unsigned NOT NULL,
                       employee_id bigint unsigned NULL,

                       title varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                       description varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,

                       created_at timestamp NULL DEFAULT NULL,
                       updated_at timestamp NULL DEFAULT NULL,
                       CONSTRAINT tasks_employee_id_foreign
                           FOREIGN KEY (employee_id) REFERENCES users (id) ON DELETE CASCADE,
                       CONSTRAINT tasks_project_manager_id_foreign
                           FOREIGN KEY (project_manager_id) REFERENCES projects (id) ON DELETE CASCADE,
                       CONSTRAINT tasks_id_project_foreign
                           FOREIGN KEY (id_project) REFERENCES projects (id) ON DELETE CASCADE
);


-- Creazione della tabella `teams`
CREATE TABLE teams (
                       project_manager_id bigint unsigned NOT NULL,
                       collaborator_id bigint unsigned NOT NULL,
                       repo_id bigint unsigned NOT NULL, -- Correzione: usare backtick per il nome della colonna
                       created_at timestamp NULL DEFAULT NULL,
                       updated_at timestamp NULL DEFAULT NULL,
                       CONSTRAINT teams_project_manager_id_foreign
                           FOREIGN KEY (project_manager_id) REFERENCES users (id) ON DELETE CASCADE,
                       CONSTRAINT teams_collaborator_id_foreign
                           FOREIGN KEY (collaborator_id) REFERENCES users (id) ON DELETE CASCADE,
                       CONSTRAINT teams_agency_id_foreign
                           FOREIGN KEY (repo_id) REFERENCES repo (id)
);
-- OGNI TASK HA PIU PARTECIPANTI
/*
 L'UTILITA' DI QUESTA TABELLA E' AVERE MOLTEPLICI PARTECIPANTI IN UNA SINGOLA TASK
 NON HO MESSO CONTROLLI, POICHE' VIENE EFFETTUATO DALLA TAB COLLABORATORS
 */
CREATE TABLE task_participants(
                                  id_task int not null,
                                  id_user int not null,
    constraint partecipant_id_task_fg foreign key (id_task) references tasks(id),
    constraint partecipant_id_user_fg foreign key (id_user) references users('id')
);

-- Creazione della tabella `collaborators`
/*
 TABELLA FONDAMENTALE PER DARE O VIETARE L'ACCESSO AI NUOVI COLLABORATORI
 UNA VOLTA AVUTO L'ACCESSO, POTRANNO EFFETTUARE LE TASK

 */
CREATE TABLE collaborators (
                               id bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                               project_manager_id BIGINT UNSIGNED NOT NULL,
                               collaborator_id bigint unsigned NOT NULL,
                               project_id bigint unsigned NOT NULL,
                               is_verified INT NOT NULL DEFAULT 0,
                               created_at timestamp NULL DEFAULT NULL,
                               updated_at timestamp NULL DEFAULT NULL,
                               CONSTRAINT collaborators_user_id_foreign
                                   FOREIGN KEY (collaborator_id) REFERENCES users (id)
                                       ON DELETE CASCADE,
                               CONSTRAINT collaborators_project_id_foreign
                                   FOREIGN KEY (project_id)
                                       REFERENCES projects (id) ON DELETE CASCADE
);

