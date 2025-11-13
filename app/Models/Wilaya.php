<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Wilaya extends Model
{
    protected $fillable = ['name', 'arabic_name', 'longitude', 'latitude'];
     /**
     * Validation rules
     *
     * @return array<string, string>
     */
    public static function rules(): array
    {
        return [
            'name' => 'required',
        ];
    }

    /**
     * @return HasMany<Commune, $this>
     */
    public function communes(): HasMany
    {
        return $this->hasMany(Commune::class);
    }
}
