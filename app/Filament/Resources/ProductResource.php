<?php

namespace App\Filament\Resources;

use Illuminate\Support\Str;
use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn; // Pastikan menggunakan ImageColumn dengan huruf kapital

class ProductResource extends Resource
{
    
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Produk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Nama Produk')
                    ->maxLength(255),

                Forms\Components\Textarea::make('description')
                    ->required()
                    ->label('Deskripsi Produk'),

                Forms\Components\TextInput::make('price')
                    ->required()
                    ->label('Harga Produk')
                    ->numeric(),

                FileUpload::make('image')
                    ->label('Gambar Produk')
                    ->image() // Menambahkan fitur image upload
                    ->disk('public') // Menyimpan di disk 'public'
                    ->directory('products') // Menyimpan di folder 'products' di storage/public
                    ->required()
                    ->maxSize(1024) // Ukuran file maksimal 1MB
                    ->acceptedFileTypes(['image/*']), // Hanya menerima file gambar
                    

                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Kategori Produk')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama Produk')->sortable(),
                TextColumn::make('category.name')->label('Kategori')->sortable(),
                TextColumn::make('price')->label('Harga')->sortable(),
                TextColumn::make('description')->label('Deskripsi')->limit(50), // Membatasi panjang deskripsi
                ImageColumn::make('image')
                ->label('Gambar Produk')
                ->disk('public')
                ->getStateUsing(fn ($record) => $record->image ? 'products/' . $record->image : null) // Tambahkan path 'products/' jika ada gambar
                ->width (20)
                ->height(20),
                TextColumn::make('created_at')->label('Tanggal Dibuat')->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
