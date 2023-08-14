<?

declare(strict_types=1);

namespace Contentful\Management\SystemProperties\Component;

enum ActionStatus: string {
  case Created = 'created';
  case InProgress = 'inProgress';
  case Succeeded = 'succeeded';
  case Failed = 'failed';
  case Blank = '';
}