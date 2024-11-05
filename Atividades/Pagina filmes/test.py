import tkinter as tk
import random

# Configurações do jogo
LARGURA = 500
ALTURA = 500
TAMANHO_COBRA = 20
VELOCIDADE = 100  # Velocidade do jogo em milissegundos

class JogoCobrinha:
    def __init__(self, janela):
        self.janela = janela
        self.janela.title("Jogo da Cobrinha")
        
        # Canvas onde a cobrinha e a comida serão desenhadas
        self.canvas = tk.Canvas(self.janela, width=LARGURA, height=ALTURA, bg="black")
        self.canvas.pack()

        # Direção inicial da cobra
        self.direcao = 'Right'

        # Cria a cobra e a comida
        self.cobra = [(100, 100), (80, 100), (60, 100)]  # Coordenadas iniciais da cobra
        self.comida = self.criar_comida()

        # Desenha os elementos iniciais na tela
        self.desenhar_cobra()
        self.desenhar_comida()

        # Inicia o controle do teclado
        self.janela.bind('<KeyPress>', self.mudar_direcao)

        # Inicia o jogo
        self.jogar()

    def criar_comida(self):
        """Cria a comida em uma posição aleatória."""
        x = random.randint(0, (LARGURA // TAMANHO_COBRA) - 1) * TAMANHO_COBRA
        y = random.randint(0, (ALTURA // TAMANHO_COBRA) - 1) * TAMANHO_COBRA
        return x, y

    def desenhar_cobra(self):
        """Desenha a cobra na tela."""
        self.canvas.delete("cobra")  # Remove o desenho anterior da cobra
        for x, y in self.cobra:
            self.canvas.create_rectangle(x, y, x + TAMANHO_COBRA, y + TAMANHO_COBRA, fill="green", tags="cobra")

    def desenhar_comida(self):
        """Desenha a comida na tela."""
        x, y = self.comida
        self.canvas.create_oval(x, y, x + TAMANHO_COBRA, y + TAMANHO_COBRA, fill="red", tags="comida")

    def mover_cobra(self):
        """Move a cobra na direção atual."""
        x, y = self.cobra[0]

        if self.direcao == 'Up':
            y -= TAMANHO_COBRA
        elif self.direcao == 'Down':
            y += TAMANHO_COBRA
        elif self.direcao == 'Left':
            x -= TAMANHO_COBRA
        elif self.direcao == 'Right':
            x += TAMANHO_COBRA

        # Verifica se a cobra comeu a comida
        nova_cabeca = (x, y)
        if nova_cabeca == self.comida:
            self.cobra.insert(0, nova_cabeca)  # Adiciona a nova cabeça (a cobra cresce)
            self.comida = self.criar_comida()  # Cria nova comida
            self.desenhar_comida()
        else:
            self.cobra = [nova_cabeca] + self.cobra[:-1]  # Move a cobra (sem crescer)

        # Verifica colisões
        if (x < 0 or x >= LARGURA or y < 0 or y >= ALTURA or nova_cabeca in self.cobra[1:]):
            self.game_over()
        else:
            self.desenhar_cobra()

    def mudar_direcao(self, evento):
        """Muda a direção da cobra com base nas teclas pressionadas."""
        direcoes_opostas = {'Up': 'Down', 'Down': 'Up', 'Left': 'Right', 'Right': 'Left'}
        nova_direcao = evento.keysym
        if nova_direcao in ['Up', 'Down', 'Left', 'Right'] and nova_direcao != direcoes_opostas.get(self.direcao):
            self.direcao = nova_direcao

    def jogar(self):
        """Controla o ciclo de movimentação da cobra."""
        self.mover_cobra()
        self.janela.after(VELOCIDADE, self.jogar)

    def game_over(self):
        """Exibe uma mensagem de Game Over e encerra o jogo."""
        self.canvas.create_text(LARGURA // 2, ALTURA // 2, text="GAME OVER", fill="red", font=("Arial", 24))
        self.janela.after_cancel(self.jogar)  # Encerra o loop do jogo


# Inicialização do jogo
if __name__ == "__main__":
    root = tk.Tk()
    jogo = JogoCobrinha(root)
    root.mainloop()