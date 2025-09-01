<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Option
 *
 * @property int $id
 * @property int $question_id
 * @property string|null $label
 * @property string $text
 * @property bool $is_correct
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Question $question
 */
class Option extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'options';

    protected $casts = [
        'question_id' => 'int',
        'is_correct' => 'bool',
    ];

    protected $fillable = [
        'question_id',
        'label',
        'text',
        'is_correct',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
