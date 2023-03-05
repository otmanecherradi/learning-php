-- Adminer 4.8.1 PostgreSQL 13.3 dump

\connect "school__php";

DROP TABLE IF EXISTS "absences";
CREATE TABLE "public"."absences" (
    "week" integer NOT NULL,
    "cne" character varying(25) NOT NULL,
    "nbr" integer,
    CONSTRAINT "ab_pk" PRIMARY KEY ("week", "cne")
) WITH (oids = false);


DROP TABLE IF EXISTS "students";
CREATE TABLE "public"."students" (
    "cne" character varying(25) NOT NULL,
    "name" character varying(25),
    "group" character varying(25),
    CONSTRAINT "pk" PRIMARY KEY ("cne")
) WITH (oids = false);


DROP TABLE IF EXISTS "users";
DROP SEQUENCE IF EXISTS users_id_seq;
CREATE SEQUENCE users_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."users" (
    "id" integer DEFAULT nextval('users_id_seq') NOT NULL,
    "username" character varying(25),
    "pwd" character varying(256)
) WITH (oids = false);


ALTER TABLE ONLY "public"."absences" ADD CONSTRAINT "absences_cne_fkey" FOREIGN KEY (cne) REFERENCES students(cne) NOT DEFERRABLE;

-- 2023-01-08 12:40:22.802311+00
