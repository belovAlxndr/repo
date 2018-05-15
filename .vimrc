call plug#begin('~/.vim/plugged')

Plug 'scrooloose/nerdtree', { 'on':  'NERDTreeToggle' }
Plug 'Xuyuanp/nerdtree-git-plugin'
Plug 'ctrlpvim/ctrlp.vim'
Plug 'msanders/snipmate.vim'
Plug '2072/PHP-Indenting-for-VIm'
Plug 'StanAngeloff/php.vim'
Plug 'vim-airline/vim-airline'
Plug 'tpope/vim-fugitive'
Plug 'mhinz/vim-signify'
Plug 'majutsushi/tagbar'

call plug#end()


syntax enable
set backspace=indent,eol,start
let mapleader = ','
set number
set tabstop=4
set shiftwidth=4
set smarttab
set expandtab
set smartindent

set rnu
set laststatus=2


set encoding=utf-8
set termencoding=utf-8
set cursorline

"-------------Visuals--------------"

colo atom-dark-256
set foldcolumn=2
hi FoldColumn ctermbg=bg
hi LineNr ctermbg=bg
hi vertsplit ctermfg=bg ctermbg=bg

"-------------Search--------------"

set hlsearch
set incsearch

"-------------Mappings--------------"

nmap <Leader>ev :tabedit $MYVIMRC<cr>
nmap <Leader>sv :source ~/.vimrc<cr>
nmap <Leader>es :tabedit <cr>
nmap <Leader><space> :nohlsearch<cr>
nmap nn :NERDTreeToggle<cr>
let NERDTreeShowHidden=1

"-------------Auto-Commands--------------"

"Automatically source the vimrc file on save"
augroup myvimrchooks
autocmd!
autocmd bufwritepost .vimrc source ~/.vimrc
augroup END
