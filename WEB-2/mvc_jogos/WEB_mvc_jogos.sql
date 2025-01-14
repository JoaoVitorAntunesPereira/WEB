CREATE TABLE plataforma (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(35) 
);

CREATE TABLE genero (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(35)
);

CREATE TABLE classificacao_indicativa (
    id INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(20)
);


CREATE TABLE jogo (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(50),
    data_lancamento DATE,
    desenvolvedor VARCHAR(50),
    distribuidora VARCHAR(50),
    id_classificacao INT,
    FOREIGN KEY (id_classificacao) REFERENCES classificacao_indicativa(id)
);

CREATE TABLE jogo_plataforma (
    id_jogo INT,
    id_plataforma INT,
    FOREIGN KEY (id_jogo) REFERENCES jogo(id),
    FOREIGN KEY (id_plataforma) REFERENCES plataforma(id)
);

CREATE TABLE jogo_genero (
    id_jogo INT,
    id_genero INT,
    FOREIGN KEY (id_jogo) REFERENCES jogo(id),
    FOREIGN KEY (id_genero) REFERENCES genero(id)
);

INSERT INTO plataforma (nome) VALUES
('PC'),
('PlayStation 1 (PS1)'),
('PlayStation 2 (PS2)'),
('PlayStation 3 (PS3)'),
('PlayStation 4 (PS4)'),
('PlayStation 5 (PS5)'),
('Xbox'),
('Xbox 360'),
('Xbox One'),
('Xbox Series X/S'),
('Nintendo Switch'),
('Nintendo Wii'),
('Nintendo Wii U'),
('Nintendo DS'),
('Nintendo 3DS'),
('Game Boy'),
('Game Boy Advance'),
('GameCube'),
('Sega Genesis'),
('Sega Dreamcast'),
('PlayStation Portable (PSP)'),
('PlayStation Vita (PS Vita)'),
('Stadia'),
('Steam Deck'),
('Android'),
('iOS'),
('VR (Virtual Reality)'),
('Arcade');

INSERT INTO genero (nome) VALUES
('Ação'),
('Aventura'),
('RPG'),
('Estratégia'),
('Simulação'),
('Esportes'),
('Corrida'),
('Puzzle'),
('Luta'),
('Plataforma'),
('Horror de Sobrevivência'),
('Battle Royale'),
('Tiro em Primeira Pessoa (FPS)'),
('Tiro em Terceira Pessoa (TPS)'),
('MOBA'),
('MMORPG'),
('Roguelike'),
('Roguelite'),
('Metroidvania'),
('Sandbox'),
('Construção e Gerenciamento'),
('Narrativo'),
('Party Game'),
('Ritmo'),
('Visual Novel'),
('Hack and Slash'),
('Tactical RPG'),
('Deck-Building'),
('Idle/Clicker'),
('Open World'),
('Stealth'),
('Real-Time Strategy (RTS)'),
('Turn-Based Strategy (TBS)');

INSERT INTO classificacao_indicativa (descricao) VALUES 
('Livre'), 
('10 anos'), 
('12 anos'), 
('16 anos'), 
('18 anos');

